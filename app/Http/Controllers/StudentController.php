<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
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

        return redirect()->route('students.index');
    }


    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
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

        $student->update($request->all());

        if ($request->courses) {
            $syncData = [];
            foreach ($request->courses as $courseId) {
                $syncData[$courseId] = ['extra_field' => $request->extra_field[$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
