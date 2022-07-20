<?php

namespace App\Models\Itoma;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * @var string Table override
     */
    protected $table = 'departments';

    /**
     * @return relation Users that are in this department
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
