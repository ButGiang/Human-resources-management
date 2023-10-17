<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salarySchedule extends Model
{
    use HasFactory;
    protected $table = "salarySchedule";
    protected $primaryKey = 'salarySchedule_id';

    protected $fillable = [
        'salarySchedule_id',
        'position_id',
        'money'
    ];

    public $timestamps = false;
    
    public function position() {
        return $this->hasOne(position::class, 'position_id', 'position_id')->withDefault(['name' => '']);
    }
}
