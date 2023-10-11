<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;

    protected $table = "position";
    protected $primaryKey = 'position_id';

    protected $fillable = [
        'position_id',
        'name',
        'describe'
    ];

    public $timestamps = false;
}
