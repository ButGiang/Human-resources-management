<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insurance extends Model
{
    use HasFactory;

    protected $table = "insurance";
    protected $primaryKey = 'insurance_id';

    protected $fillable = [
        'insurance_id',
        'registration_date',
        'register_place',
        'hospital',
        'id'
    ];

    public $timestamps = false;

    public function staff() {
        return $this->hasOne(staffs::class, 'id', 'id')->withDefault(['first_name' => '', 'last_name' => '']);
    }
}
