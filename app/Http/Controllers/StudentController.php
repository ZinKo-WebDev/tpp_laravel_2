<?php

namespace App\Http\Controllers;


use App\Http\Repository\StudentRepositoryInterface;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {

    }
    public function index()
    {
        $students = $this->studentRepository->all();
        return view('students.index', compact('students'));
    }

    public function create(Request $request)
    {
        $courses = $this->studentRepository->create($request);
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->studentRepository->store($request);

        return redirect()->route('students.index');
    }


    public function edit(Student $student)
    {
        $courses = $this->studentRepository->edit($student);
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $this->studentRepository->update($request, $student);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
      $this->studentRepository->delete($student);
        return redirect()->route('students.index');
    }
}
