<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $guarded = [];

    public static function isFollowed($leader,$following_id){
        return self::where(['leader_id' => $leader->id, 'follower_id' => $following_id])->exists();
        
    }
}
