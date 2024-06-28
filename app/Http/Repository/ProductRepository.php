<?php

namespace App\Http\Repository;

use App\Models\Product;
use App\Models\ProductImage;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        $product_item = Product::with('images')->get();
        return $product_item;
    }

    public function create( $request)
    {
    }
    public function store( $request){
        $product = Product::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('uploads'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }
    }
    public function edit($id){
        $data = Product::with('images')->find($id);
        if (!$data) {
            return redirect()->route('productIndex')->withErrors('Product not found.');
        }
        return $data;
    }
    public function update( $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->update($request->all());

        if ($request->hasFile('images')) {
            foreach ($product->images as $image) {
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('uploads'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }
    }

    public function delete($product)
    {

    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }
}
