<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Request extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'category_id',
        'present_id', 'note',
        'prefecture','city','location',
        'span_time', 'public',
        'total_option_price', 'ordered_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
