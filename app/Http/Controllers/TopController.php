<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thread;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function index()
    {
        $threads = Thread::orderBy('id', 'desc')
            ->with(['user', 'comments'])
            ->paginate(10);
        return view('welcome')->with(compact('threads'));
    }

}
