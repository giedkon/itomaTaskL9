<?php

namespace App\Models\Itoma;

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
}
