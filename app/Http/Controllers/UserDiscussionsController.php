<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Discussion;

class UserDiscussionsController extends Controller
{
    public function discussions()
    {
        $posts = User::find(1)->posts;
        // $posts = User::find($user_id)->posts;
        return view('user');
    }
}
