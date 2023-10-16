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
        'active',
        'department_id'
    ];

    public $timestamps = false;

    public function department() {
        return $this->hasOne(department::class, 'department_id', 'department_id')->withDefault(['name' => '']);
    }
}
