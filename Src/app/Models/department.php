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
        'active',
        'manager_id'
    ];

    public $timestamps = false;

    public function manager() {
        return $this->hasOne(staffs::class, 'id', 'manager_id')->withDefault(['first_name' => '', 'last_name' => '']);
    }
}
