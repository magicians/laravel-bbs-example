<?php
/**
 * Created by PhpStorm.
 * User: bko
 * Date: 2015/10/10
 * Time: 17:29
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Thread;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class ThreadController extends Controller
{
    const RANDOM_NAME_LENGTH = 8;

    public function add()
    {
        return view('threads.add');
    }

    public function create(Request $req)
    {
        $validator = $this->makeValidator($req);
        $thread = $validator->getData();
        if ($validator->fails()) {
            return view('threads.add')
                ->with(compact('thread'))
                ->withErrors($validator);
        }
        $name = $this->getName($req);
        $user = User::firstOrCreate([
            'name' => $name,
        ]);
        $thread['user_id'] = $user->id;

        Thread::create($thread);
        return redirect()->route('top');
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
            'title' => sprintf('required'),
            'body' => sprintf('required'),
        ]);
    }
}