<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discipline extends Model
{
    use HasFactory;
    protected $table = "discipline";
    protected $primaryKey = 'discipline_id';

    protected $fillable = [
        'name',
        'date',
        'describe',
        'image',
        'punish',
        'id'
    ];

    public $timestamps = false;
    
    public function staff() {
        return $this->hasOne(staffs::class, 'id', 'id')->withDefault(['first_name' => '', 'last_name' => '']);
    }

    public function getTotal($id, $month) {
        return discipline::where('id', $id)->whereMonth('date', $month)->sum('punish');
    }
}
