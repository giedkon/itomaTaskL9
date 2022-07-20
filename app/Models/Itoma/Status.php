<?php

namespace App\Models\Itoma;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * @var string Table override
     */
    protected $table = 'statuses';
}
