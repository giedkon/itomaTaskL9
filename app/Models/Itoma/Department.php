<?php

namespace App\Models\Itoma;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
