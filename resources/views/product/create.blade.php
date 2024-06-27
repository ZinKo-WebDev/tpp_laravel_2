
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Create Product</h1>
        <div class="col-6">
            <a href="{{route('productIndex')}}" class="btn btn-sm btn-dark text-white"><i class="fa-solid fa-arrow-left-long"></i>back</a>
        </div>
        <form method="post" action="{{route('productStore')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-4 mb-4">
                <label for="productName">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" id="productName" placeholder="Product Name">
                @error('name')
                <span class="text-danger">* Please enter product name!</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="productType">Type</label>
                <input type="text" name="type" class="form-control" id="productType" placeholder="Type">
                @error('type')
                <span class="text-danger">* Please enter product type!</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="productImages">Images</label>
                {{--   FeatureDay05 dev_phyoewai  --}}
                <input type="file" name="images[]" class="form-control-file" id="productImages" multiple>
                @error('images')
                <span class="text-danger">* Image Error!</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="productPrice">Price</label>
                <input type="number" name="price" class="form-control" id="productPrice" placeholder="Price">
                @error('price')
                <span class="text-danger">* Please enter product price!</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="productQuantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="productQuantity" placeholder="Quantity">
                @error('quantity')
                <span class="text-danger">* Please enter product quantity!</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-info text-white mb-4">Create</button>
        </form>
    </div>
@endsection

