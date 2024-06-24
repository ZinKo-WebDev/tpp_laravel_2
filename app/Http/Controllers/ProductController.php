<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $product_item = Product::with('images')->get();
        return view('product.index', compact('product_item'));
    }
    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request) // ProductRequest $request
    {
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

        return redirect()->route('productIndex');
    }
    public function edit($id)
    {
        $data = Product::with('images')->find($id);

        if (!$data) {
            return redirect()->route('productIndex')->withErrors('Product not found.');
        }

        return view('product.edit', compact('data'));
    }

    public function update(Request $request, $id)
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

        return redirect()->route('productIndex');
    }

    ##-> FeatureDay05 dev_phyoewai
    public function destroy(Product $productdel)
    {
        foreach ($productdel->images as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $productdel->delete();
        return redirect()->route('productIndex');
    }
}
