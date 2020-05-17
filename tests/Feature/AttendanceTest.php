<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Attendance;

use App\Student;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp() : void 
    {
        parent::setUp();

        factory(Student::class,10)->create(['class_id'=>1,'section_id'=>1])
            ->each(function($student){
                $student->attendance()
                ->createMany(factory(Attendance::class,30)
                ->make(['std_id'=>null])
                ->toArray());
            });

        factory(Student::class,2)->create(['class_id'=>1,'section_id'=>1]);
        
    }

    public function test_daily_attendance_by_class_with_section()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('attendance.daily',['class'=>'1','section'=>'1']));

        $this->assertEquals(count(Student::where(['class_id'=>1,'section_id'=>1])->get()),count($response->json()['data']));

    }


    public function test_monthly_attendance_by_class_with_section()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('attendance.monthly',['class'=>'1','section'=>'1','month'=>'2020-05']));

        dd($response->json());

    }



}
