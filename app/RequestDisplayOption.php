<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RequestDisplayOption extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'request_id',
        'display_option_id',
        'option_name', 'option_price',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function request()
    {
        return $this->belongsTo('App\Request');
    }
}
