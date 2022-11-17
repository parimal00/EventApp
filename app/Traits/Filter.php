<?php

namespace App\Traits;

trait Filter
{
    public function scopeFilter($query, $filter)
    {
        if (in_array($filter, self::STATUS)) {
            return $query->$filter();
        }
        return $query;
    }
}
