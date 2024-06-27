
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Student</h1>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="degree">Degree</label>
                <input type="text" class="form-control" id="degree" name="degree" required>
            </div>

            <div class="form-group">
                <label for="is_new_student">Is New Student</label>
                <input type="hidden" name="is_new_student" value="0">
                <input type="checkbox" id="is_new_student" name="is_new_student" value="1">
            </div>

            <div class="form-group">
                <label for="courses">Courses</label>
                <select name="courses[]" id="courses" class="form-control" multiple>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
@endsection
