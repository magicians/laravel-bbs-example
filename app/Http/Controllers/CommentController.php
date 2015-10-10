<?php
/**
 * Created by PhpStorm.
 * User: bko
 * Date: 2015/10/10
 * Time: 18:22
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Thread;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class CommentController extends Controller
{
    const RANDOM_NAME_LENGTH = 8;

    public function show($id)
    {
        $thread = Thread::find($id);
        if (!$thread) {
            return abort(404);
        }
        $comments = Comment::threadId($thread->id)->with('user')->get();
        return view('comments.show')->with(compact('thread', 'comments'));
    }

    public function create(Request $req, $id)
    {
        $thread = Thread::find($id);
        if (!$thread) {
            return abort(404);
        }
        $validator = $this->makeValidator($req);
        $comment= $validator->getData();
        if ($validator->fails()) {
            return view('comments.show')
                ->with(compact('comment', 'thread'))
                ->withErrors($validator);
        }
        $name = $this->getName($req);
        $user = User::firstOrCreate([
            'name' => $name,
        ]);
        $comment['user_id'] = $user->id;
        $comment['thread_id'] = $thread->id;

        Comment::create($comment);
        return redirect()->route('comments', ['id' => $thread->id]);
    }

    protected function getName(Request $req)
    {
        $name = trim($req->get('name'));
        if (strlen($name) === 0) {
            $name = User::createRandomName();
        }
        return $name;
    }

    protected function makeValidator(Request $req)
    {
        return Validator::make($req->all(), [
            'body' => 'required',
        ]);
    }
}