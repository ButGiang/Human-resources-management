<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    protected $table = "departments";
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_id',
        'name',
        'describe',
        'manager_id'
    ];

    public $timestamps = false;
}
