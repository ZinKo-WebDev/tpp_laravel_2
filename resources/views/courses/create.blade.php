
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Course</h1>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>
@endsection
