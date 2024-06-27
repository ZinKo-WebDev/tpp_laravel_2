
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
            </div>
            <div class="form-group">
                <label for="degree">Degree</label>
                <input type="text" class="form-control" id="degree" name="degree" value="{{ $student->degree }}" required>
            </div>

           
            <div class="form-group">
                <label for="is_new_student">Is New Student</label>
                <input type="hidden" name="is_new_student" value="0">
                <input type="checkbox" id="is_new_student" name="is_new_student" value="1" {{ $student->is_new_student ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="courses">Courses</label>
                <select name="courses[]" id="courses" class="form-control" multiple>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ in_array($course->id, $student->courses->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection
