
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Article Details</h1>
        <div class="row">
            <div class="col-6">
                <a href="{{url('/home')}}"><i class="fa-solid fa-house fa-xl"></i></a>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('articles.create')}}" class="btn btn-sm btn-info text-white">Create</a>
            </div>
        </div>
        <hr/>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">City</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($article as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->age}}</td>
                    <td>{{$a->city}}</td>
                    <td>
                        {{--    @method('dev_phyoewai')    --}}
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-2">
                                <a href="{{ route('articles.edit', $a->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                            </div>
                            <div class="col-4">
                                <form action="{{ route('articles.destroy', $a->id) }}" method="post">
                                    {{--    @method('dev_phyoewai')    --}}
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection

