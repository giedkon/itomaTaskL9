<?php

namespace App\Models\Itoma;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    public function carStatus()
    {
        return $this->hasMany(CarStatus::class, 'cars_id');
    }
    
    public function carManagement()
    {
        return $this->hasMany(CarManagement::class, 'cars_id');
    }

    public function carStatusByDate($date)
    {
        return $this->hasMany(CarStatus::class, 'cars_id')->get()->filter(function ($item) use ($date) {
            if (Carbon::create($date)->between($item->date_from, $item->date_to)) {
                return $item;
            }
        })->first();
    }

    public function carManagementByDate($date)
    {
        return $this->hasMany(CarManagement::class, 'cars_id')->get()->filter(function ($item) use ($date) {
            if (Carbon::create($date)->between($item->date_from, $item->date_to)) {
                return $item;
            }
        })->first();
    }

    public function carPreviousManagementByDate($date)
    {
        $current = $this->carManagementByDate($date);
        return $this->hasMany(CarManagement::class, 'cars_id')->get()->filter(function ($item) use ($current) {
            if (Carbon::create($item->date_from)->lessThan($current->date_from)) {
                return $item;
            }
        })->first();
    }
}
