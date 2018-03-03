<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Present extends Model
{
    use SoftDeletes;

    const ORDER_STATUS_NEW = 'new';
    const ORDER_STATUS_OK = 'ok';
    const ORDER_STATUS_NG = 'ng';
    const ORDER_STATUS_SUCCESS = 'success';
    const ORDER_STATUS_FAIL = 'fail';

    protected static $status = [
        self::ORDER_STATUS_NEW => '申請中',
        self::ORDER_STATUS_OK => '成立',
        self::ORDER_STATUS_NG => '不成立',
        self::ORDER_STATUS_SUCCESS => '完了',
        self::ORDER_STATUS_FAIL => '失敗',
    ];

    protected $fillable = [
            'user_id', 'request_id',
            'note', 'estimate_fee', 'fee_type',
            'estimate_at', 'status',
            'ordered_token',
    ];

    public function getStatus()
    {
        return self::$status[$this->status];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function request()
    {
        return $this->belongsTo('App\Request');
    }
}
