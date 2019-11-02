<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Discussion;
use Laravel\Scout\Searchable;

class Channel extends Model
{
    use Searchable;

    protected $table = "channels";
	
    protected $fillable = ['title', 'slug'];

    public function discussions(){

    	return $this->hasMany(Discussion::class);

    }

    public function searchableAs()
    {
        return 'channels_index';
    }
}