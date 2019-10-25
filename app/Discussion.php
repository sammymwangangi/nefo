<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Channel;
use Laravel\Scout\Searchable;

class Discussion extends Model
{

    protected $fillable = ['title','content','user_id','channel_id','slug'];
    public function channel(){
    	return $this->belongsTo(Channel::class);
    }
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function watchers(){
    	return $this->hasMany('App\Watcher');
    }
    public function is_being_watched_by_auth_user()
    {
        $id = Auth::id();

        $watchers_ids = array();

        foreach($this->watchers as $w):

            array_push($watchers_ids, $w->user_id);

        endforeach;

        if(in_array($id, $watchers_ids))
        {
            return true;
        }

        else{
            return false;
        }
    }

    public function hasBestAnswer()
    {
        $result = false;

        foreach($this->replies as $reply)
        {
            if($reply->best_answer)
            {
                $result = true;

                break;
            }
        }

        return $result;
    }
}