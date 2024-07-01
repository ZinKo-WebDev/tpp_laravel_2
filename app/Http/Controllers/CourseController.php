<?php
namespace App\Http\Controllers;
use App\Http\Repository\CourseRepositoryInterface;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(private CourseRepositoryInterface $courseRepository){

    }
    public function index()
    {
  $courses= $this->courseRepository->all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
       $this->courseRepository->create($request);

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {

$this->courseRepository->update($request, $course);
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $this->courseRepository->delete($course);
        return redirect()->route('courses.index');
    }
}
