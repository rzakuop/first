<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            //$user->items()->delete();
        });
    }

    protected $table = 'users';

    protected $fillable = [
        'email', 'password',
        'last_name', 'first_name',
        'zip_code', 'prefecture', 'city',
        'address','building','tel',
        'confirmation_token', 'confirmation_sent_at',
        'canceled_reason', 'canceled_other_reason', 'canceled_at',
    ];

    protected $hidden = [
        'password',
        'confimarted_at',
        'reset_password_token',
        'remember_token',
        'change_email_token',
    ];

    protected static $canceled_reasons = [
        '求めるサービスが見つからないため',
        'マナー違反が多いため',
        'サイトが使いづらいから',
        '通知が多いから',
        'その他',
    ];

    public function requests()
    {
        return $this->hasMany('App\Request');
    }

    public function RequestDisplayOptions()
    {
        return $this->hasMany('App\RequestDisplayOption');
    }

    public function presents()
    {
        return $this->hasMany('App\Present');
    }

    public static function getCanceledReasons()
    {
        return static::$canceled_reasons;
    }

    public function getName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function isActive()
    {
        return $this->getStatus() == 'アクティブ';
    }

    public function getStatus()
    {
        if ($this->canceled_at) {
            return '退会済';
        }
        else {
            return 'アクティブ';
        }
    }
}
