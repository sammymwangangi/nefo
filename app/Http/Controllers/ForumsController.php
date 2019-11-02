<?php

namespace App\Http\Controllers;
use Auth;
use App\Discussion;
use App\Channel;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class ForumsController extends Controller
{
    public function index()
    {
    	//$discussions = Discussion::orderBy('created_at', 'desc')->paginate(7);

        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(5);
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
                $results = Discussion::orderBy('created_at', 'desc')->paginate(5);
                break;
        }

    	return view('forum', ['discussions' => $results]);
    }

    public function channel($slug)
    {
    	$channel = Channel::where('slug', $slug)->first();

    	return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }

    public function profile(Request $request, $name)
    {
        $user = User::where('name', $name)->first();
        $discussions = Discussion::where("user_id", "=", $user->id)->paginate(5);

        return view('profile')->with(array("user" => $user, "discussions" => $discussions));
    }
    
}

// str_slug($title, $separator);
// $title = str_slug("Laravel 5 Framework", "-");