<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Attendance as DailyResource;
use App\Http\Resources\MonthlyAttendance as MonthlyResource;

use App\Attendance;
use App\Student;

use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function daily($class,$section)
    {
        $data = Student::where(['section_id'=>$section,'class_id'=>$class])
                ->with(['attendance'=>function($query){
                    $query->whereBetween('timestamp', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()]);
                    }])
                ->get();

        return DailyResource::collection($data);
    }


    public function monthly($class,$section,$month)
    {
        $data = Student::where(['section_id'=>$section,'class_id'=>$class])
        ->with(['attendance'=>function($query) use($month){
            $query->whereBetween('timestamp', [
                Carbon::parse($month)->startOfMonth()->startOfDay()->toDateTimeString(),
                Carbon::parse($month)->endOfMonth()->endOfDay()->toDateTimeString(),
                ]);
            }])
        ->get();
        
        return MonthlyResource::collection($data);
        
    }

    public function enroll(Student $student,Request $request)
    {
        Attendance::create($request->data);
        
        return response()->json(['msg'=>'Attendance added'],201);
    }




}
