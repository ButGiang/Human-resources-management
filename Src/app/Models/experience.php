<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    use HasFactory;
    protected $table = "experience";
    protected $primaryKey = 'experience_id';

    protected $fillable = [
        'experience_id',
        'type',
        'describe',
        'date',
        'id'
    ];

    public $timestamps = false;

    public function staff() {
        return $this->hasOne(staffs::class, 'id', 'id')->withDefault(['first_name' => '', 'last_name' => '']);
    }
}
