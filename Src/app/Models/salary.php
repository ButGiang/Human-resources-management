<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    use HasFactory;

    protected $table = "salary";
    protected $primaryKey = 'salary_id';

    protected $fillable = [
        'salary_id',
        'money',
        'id',
        'date'
    ];

    public $timestamps = false;
    
    public function staff() {
        return $this->hasOne(staffs::class, 'id', 'id')->withDefault(['first_name' => '', 'last_name' => '']);
    }
}
