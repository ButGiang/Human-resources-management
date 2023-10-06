<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achievement extends Model
{
    use HasFactory;
    protected $table = "achievement";
    protected $primaryKey = 'achievement_id ';

    protected $fillable = [
        'name',
        'date',
        'describe',
        'image',
        'reward',
        'id'
    ];

    public $timestamps = false;
    
    public function staff() {
        return $this->hasOne(staffs::class, 'id', 'id')->withDefault(['first_name' => '', 'last_name' => '']);
    }
}
