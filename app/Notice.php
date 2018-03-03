<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Notice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content',
        'start_at', 'end_at',
    ];

    public function getStartAt()
    {
        return Carbon::parse($this->start_at)->format('Y-m-d');
    }

    public function getEndAt()
    {
        return Carbon::parse($this->end_at)->format('Y-m-d');
    }

}
