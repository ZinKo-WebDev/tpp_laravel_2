
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Create Category</h1>
        <div class="col-6">
            <a href="{{route('categoryIndex')}}" class="btn btn-sm btn-dark text-white"><i class="fa-solid fa-arrow-left-long"></i>back</a>
        </div>
        <form method="post" action="{{route('categoryStore')}}"
              class="d-flex justify-content-center">
            @csrf
            <div class="row">
                <div class="mt-4 mb-4">
                    <input type="text" name="name" id="" placeholder="create new category"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-info text-white">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection

