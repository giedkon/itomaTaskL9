<?php

namespace App\Models\Itoma;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Car Model
 */
class Car extends Model
{
    use HasFactory;

    /**
     * @var string Table override
     */
    protected $table = 'cars';

    /**
     * @return relationship All car statuses
     */
    public function carStatus()
    {
        return $this->hasMany(CarStatus::class, 'cars_id');
    }

    /**
     * @return relationship All car management
     */
    public function carManagement()
    {
        return $this->hasMany(CarManagement::class, 'cars_id');
    }

    /**
     * @param mixed $date date filter
     * 
     * @return CarStatus current status for given date
     */
    public function carStatusByDate($date)
    {
        return $this->hasMany(CarStatus::class, 'cars_id')->get()->filter(function ($item) use ($date) {
            if (Carbon::create($date)->between($item->date_from, $item->date_to)) {
                return $item;
            }
        })->first();
    }

    /**
     * @param mixed $date date filter
     * 
     * @return CarManagement current management for given date
     */
    public function carManagementByDate($date)
    {
        return $this->hasMany(CarManagement::class, 'cars_id')->get()->filter(function ($item) use ($date) {
            if (Carbon::create($date)->between($item->date_from, $item->date_to)) {
                return $item;
            }
        })->first();
    }

    /**
     * @param mixed $date date filter
     * 
     * @return CarManagement previous management for given date
     */
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
