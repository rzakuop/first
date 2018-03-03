<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewee_id',
        'reviewer_id',
        'rate',
        'comment',
    ];

    public function reviewee()
    {
        return $this->belongsTo('App\User', 'reviewee_id');
    }

    public function reviewer()
    {
        return $this->belongsTo('App\User', 'reviewer_id');
    }
}
