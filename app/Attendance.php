<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable=['id','user_id','timestamp','status','punch'];

    public $timestamps=false;

    protected $table='attendance';


    public function student()
    {
        return $this->belongsTo(Student::class,'std_id');
    }

}
