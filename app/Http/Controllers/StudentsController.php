<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\Student as Resource;
use Illuminate\Http\Request;


class StudentsController extends Controller
{

    public function index()
    {
        return Resource::collection(Student::paginate(50));
    }

    public function store(StoreStudentRequest $request)
    {
        $data=Student::create($request->validated());

        return new Resource($data);
    }


    public function show(Student $student)
    {
        return new Resource($student);
    }


    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return new Resource($student);
    }

    public function destroy(Student $student)
    {
        //
    }


    // public function currentAttendance(Student $student)
    // {
    //     return new Resource($student->today());
    // }

    // public function allAttendance()
    // {
    //     return Resource::collection($student->attendance_log());
    // }



}
