
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Create Articles</h1>
        <div class="col-6">
            <a href="{{route('articles.index')}}" class="btn btn-sm btn-dark text-white mb-4"><i class="fa-solid fa-arrow-left-long"></i>back</a>
        </div>
        <form action="{{ route('articles.update', $data->id) }}" method="POST">
            @csrf
            {{--    @method('dev_phyoewai')    --}}
            @method('PUT')
            <div class="col-md-6 offset-md-3">
                <div class="mt-4">
                    <input type="text" name="name" value="{{$data->name}}" class="form-control">
                </div><br>
                <div class="">
                    <input type="number" name="age" value="{{$data->age}}" class="form-control">
                </div><br>
                <div class="">
                    <input type="text" name="city" value="{{$data->city}}" class="form-control">
                </div><br>
                <button type="submit" class="btn btn-info btn-sm text-white float-end">Update</button>
            </div>
        </form>
    </div>

@endsection

