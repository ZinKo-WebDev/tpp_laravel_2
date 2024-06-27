

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Students</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Degree</th>
                <th>Is New Student</th>
                <th>Courses</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->degree }}</td>
                    <td>{{ $student->is_new_student ? 'Yes' : 'No' }}</td>
                    <td>
                        @foreach($student->courses as $course)
                            <span class="badge bg-info">{{ $course->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
