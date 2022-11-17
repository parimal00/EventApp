<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;

class Event extends Model
{
    use HasFactory, Filter;
    protected $guarded = [];

    const STATUS = [
        'upcomingEvents',
        'finishedEvents',
        'finishedWithInAWeekEvents',
        'runningEvents'
    ];

    public function scopeUpcomingEvents($query)
    {
        $query->where('start_date', '>', today()->format('y-m-d'));
    }
    public function scopeFinishedEvents($query)
    {
        $query->where('end_date', '<', today()->format('y-m-d'));
    }
    public function scopeFinishedWithInAWeekEvents($query)
    {
        $query->where('end_date', '<', today()->addDays(7));
    }
    public function scopeRunningEvents($query)
    {
        $query->where('start_date','<=', today())
            ->where('end_date', '>=', today());
    }
}
