<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PresentPay extends Model
{
    protected $fillable = [
        'user_id', 'present_id',
        'token', 'amount', 'credit_id',
        'status', 'error_message'
    ];

    protected static $status = [
        'new' => '与信',
        'cancel' => 'キャンセル',
        'ng' => '失敗',
        'ok' => '成功',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order()
    {
        return $this->belongsTo('App\Present');
    }
}
