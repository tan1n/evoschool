<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyAttendance extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'student'=>[
                'id'=>$this->id,
                'roll'=>$this->class_roll,
                'name'=>$this->name,
                'phone'=>$this->phone
            ],
            'attendance'=> $this->attendance  
        ];
    }
}
