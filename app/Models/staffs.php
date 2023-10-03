<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staffs extends Model
{
    use HasFactory;
    protected $table = "staffs";

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'CCCD',
        'email',
        'address',
        'phone',
        'avatar',
        'recruit_day',
        'active',
        'department_id',
        'position_id',
        'degree_id'
    ];


    public function department() {
        return $this->hasOne(department::class, 'department_id', 'department_id')->withDefault(['name' => '']);
    }

    public function position() {
        return $this->hasOne(position::class, 'position_id', 'position_id')->withDefault(['name' => '']);
    }

    public function degree() {
        return $this->hasOne(degree::class, 'degree_id', 'degree_id')->withDefault(['name' => '']);
    }
}
