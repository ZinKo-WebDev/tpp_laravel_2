
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Create Articles</h1>
        {{--    @method('PUT')    --}}
        <div class="col-6">
            <a href="{{route('articles.index')}}" class="btn btn-sm btn-dark text-white"><i class="fa-solid fa-arrow-left-long"></i>back</a>
        </div>
        <form method="post" action="{{ route('articles.store') }}">
            @csrf
            <div class="col-md-6 offset-md-3 my-5">
                <div class="my-4">
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <div class="my-4">
                    <input type="number" name="age" class="form-control" placeholder="age">
                </div>
                <div class="my-4">
                    <input type="text" name="city" class="form-control" placeholder="city">
                </div>
                <button type="submit" class="btn btn-info btn-sm text-white">Create</button>
            </div>
        </form>
    </div>

@endsection

