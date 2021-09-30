<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    use HasFactory;

    const ACCESS_PUBLIC = 0;
    const ACCESS_UNLISTED = 1;
    const ACCESSES = [
        self::ACCESS_PUBLIC,
        self::ACCESS_UNLISTED
    ];

    const NEVER = 'never';
    const TEN_MINUTES = 'ten_minutes';
    const ONE_HOUR = 'one_hour';
    const THREE_HOURS = 'three_hours';
    const ONE_DAY = 'one_day';
    const ONE_WEEK = 'one_week';
    const ONE_MONTH = 'one_month';

    const EXPIRATION_TIME_ARRAY = [
        self::NEVER,
        self::TEN_MINUTES,
        self::ONE_HOUR,
        self::THREE_HOURS,
        self::ONE_DAY,
        self::ONE_WEEK,
        self::ONE_MONTH
    ];

    protected $fillable = [
        'title',
        'content',
        'access',
        'expiration_time'
    ];

    public function setExpirationTimeAttribute($value)
    {
        switch ($value) {
            case self::TEN_MINUTES:
                $this->attributes['expiration_time'] = now()->addMinutes(10);
                break;
            case self::ONE_HOUR:
                $this->attributes['expiration_time'] = now()->addHour();
                break;
            case self::THREE_HOURS:
                $this->attributes['expiration_time'] = now()->addHours(3);
                break;
            case self::ONE_DAY:
                $this->attributes['expiration_time'] = now()->addDay();
                break;
            case self::ONE_WEEK:
                $this->attributes['expiration_time'] = now()->addWeek();
                break;
            case self::ONE_MONTH:
                $this->attributes['expiration_time'] = now()->addMonth();
                break;
            case self::NEVER:
                $this->attributes['expiration_time'] = null;
                break;
            default:
                $this->attributes['expiration_time'] = null;
        }
    }
}
