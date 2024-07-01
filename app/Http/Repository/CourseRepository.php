<?php

namespace App\Http\Repository;

use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function all()
    {
        $courses = Course::all();
        return $courses;
    }

    public function create( $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Course::create($request->all());
    }

    public function update( $request, $course)
    {
        $course = Course::findOrFail($course->id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $course->update($request->all());
    }

    public function delete($course)
    {
        $course->delete();
    }

    public function find($id)
    {
        return Course::findOrFail($id);
    }
}
