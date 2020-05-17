<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Student;

class StudentTest extends TestCase
{

    use RefreshDatabase;

    private $total=1000;

    private $student;


    public function setUp() :void 
    {
        parent::setUp();

        factory(Student::class,$this->total)->create();

        $this->student=factory(Student::class,1)->make()->first()->toArray();
    }



    public function test_student_Create()
    {
        $this->withoutExceptionHandling();

        $response=$this->json('post',route('students.store'),$this->student);

        $response->assertStatus(201);
        
    }


    public function test_student_index()
    {
        $this->withoutExceptionHandling();

        $response=$this->get(route('students.index'));
        
        $this->assertEquals($response->json()['meta']['total'],$this->total);
        
    }


    public function test_student_can_update(){

        $this->withoutExceptionHandling();

        $updated=factory(Student::class,1)->make();

        $response=$this->json('put',route('students.update',1),$updated->first()->toArray());

        $response->assertStatus(200);

    }


    public function test_student_can_delete(){

        $response=$this->json('delete',route('students.destroy',rand(1,$this->total)));
        
        $response->assertStatus(200);

    }




}
