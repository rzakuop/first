<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = [
        'followed_id',
        'follower_id',
    ];

    public function follower()
    {
        return $this->belongsTo('App\User', 'follower_id');
    }

    public function followed()
    {
        return $this->belongsTo('App\User', 'followed_id');
    }
}
