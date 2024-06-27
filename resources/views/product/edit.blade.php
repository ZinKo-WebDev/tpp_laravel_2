
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Edit Product</h1>
        <div class="col-6 mb-4">
            <a href="{{route('productIndex')}}" class="btn btn-sm btn-dark text-white"><i class="fa-solid fa-arrow-left-long"></i>back</a>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('productUpdate', $data->id) }}" enctype="multipart/form-data">
            @csrf
            {{--    FeatureDay05 dev_phyoewai--}}
            {{--    @method('PUT')--}}

            <div class="form-group mb-4">
                <label for="productName">Name</label>
                <input type="text" name="name" class="form-control" id="productName" value="{{ $data->name }}">
            </div>

            <div class="form-group mb-4">
                <label for="productType">Type</label>
                <input type="text" name="type" class="form-control" id="productType" value="{{ $data->type }}">
            </div>

            <div class="form-group mb-4">
                <label for="productImages">Images</label>
                <input type="file" name="images[]" class="form-control-file" id="productImages" multiple>
                <div>
                    {{--    FeatureDay05 dev_phyoewai--}}
                    @foreach ($data->images as $image)
                        <img src="{{ asset('uploads/'.$image->image_path) }}" alt="Product Image" style="width: 100px; height: 100px;">
                    @endforeach
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="productPrice">Price</label>
                <input type="number" name="price" class="form-control" id="productPrice" value="{{ $data->price }}">
            </div>

            <div class="form-group mb-4">
                <label for="productQuantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="productQuantity" value="{{ $data->quantity }}">
            </div>

            <button type="submit" class="btn btn-sm btn-info mb-4 text-white">Update</button>
        </form>
    </div>


@endsection
