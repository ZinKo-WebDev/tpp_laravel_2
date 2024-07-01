<?php

namespace App\Http\Repository;

use App\Models\Course;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function all()
    {

        $students = Student::with('courses')->get();
       return $students;
    }

    public function create( $request)
    {

        $courses = Course::all();
        return $courses;

    }
    public function store($request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'degree' => 'required',
            'is_new_student' => 'boolean',
            'courses' => 'array',
            'extra_field' => 'array',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'is_new_student' => $request->boolean('is_new_student'),
        ]);
        if ($request->courses) {
            $syncData = [];
            foreach ($request->courses as $courseId) {
                $syncData[$courseId] = ['extra_field' => $request->extra_field[$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }
//        $student->courses()->attach($request->courses);

    }
    public function edit($student){
        $courses = Course::all();
        return $courses;
    }
    public function update($request, $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'degree' => 'required',
            'is_new_student' => 'boolean',
            'courses' => 'array',
            'extra_field' => 'array',
        ]);

        if ($request->courses) {
            $syncData = [];
            foreach ($request->courses as $courseId) {
                $syncData[$courseId] = ['extra_field' => $request->extra_field[$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }
        $student->update($request->all());

        if ($request->courses) {
            $syncData = [];
            foreach ($request->courses as $courseId) {
                $syncData[$courseId] = ['extra_field' => $request->extra_field[$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }
//        $student->courses($request->courses);

    }

    public function delete($student)
    {
        $student->delete();

    }

    public function find($id)
    {
        return Student::findOrFail($id);
    }
}
