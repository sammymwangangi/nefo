<?php

namespace App\Http\Controllers;
use Auth;
use App\Discussion;
use App\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
    	//$discussions = Discussion::orderBy('created_at', 'desc')->paginate(9);

        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(9);
                break;

            case 'solved':

                $answered = array();

                foreach (Discussion::all() as $d) {
                    if ($d->hasBestAnswer()) {
                        array_push($answered, $d);
                    }
                }

                $results = new Paginator($answered, 3);

                break;

            case 'unsolved':

                $unanswered = array();

                foreach (Discussion::all() as $d) {
                    if (!$d->hasBestAnswer()) {
                        array_push($unanswered, $d);
                    }
                }

                $results = new Paginator($unanswered, 3);

                break;
            
            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(9);
                break;
        }

    	return view('forum', ['discussions' => $results]);
    }

    public function channel($slug)
    {
    	$channel = Channel::where('slug', $slug)->first();

    	return view('channel')->with('discussions', $channel->discussions);
    }
}
