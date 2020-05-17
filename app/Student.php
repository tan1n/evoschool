<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable=[
        'name',
        'fname',
        'mname',
        'roll',
        'reg',
        'class_roll',
        'section_id',
        'class_id',
        'address','phone',
        'group_id',
        'admission_date'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function attendance()
    {
        return $this->hasMany(Attendance::class,'std_id');
    }


}
