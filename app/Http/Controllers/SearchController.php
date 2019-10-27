<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Channel;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	if($request->has('search')){	
    		$discussions = Discussion::search($request->get('search'))->paginate(5);	
    		$channels = Channel::search($request->get('search'))->paginate(5);	
    	}else{
    		$discussions = Discussion::orderBy('created_at', 'desc')->paginate(5);
    		$channels = Channel::orderBy('created_at', 'desc')->paginate(5);
    	}
        return view('forum', compact('discussions'));
    }
}
