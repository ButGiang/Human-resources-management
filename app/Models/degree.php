<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degree extends Model
{
    use HasFactory;

    protected $table = "degree";
    protected $primaryKey = 'degree_id';

    protected $fillable = [
        'degree_id',
        'name',
        'describe'
    ];

    public $timestamps = false;
}
