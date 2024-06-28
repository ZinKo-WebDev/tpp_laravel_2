<?php
namespace App\Http\Controllers;
use App\Http\Repository\ProductRepositoryInterface;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $product_item = $this->productRepository->all();
        return view('product.index', compact('product_item'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(ProductRequest $request) // ProductRequest $request
    {
        $this->productRepository->store($request);

        return redirect()->route('productIndex');
    }
    public function edit($id)
    {
       $data=$this->productRepository->edit($id);

        return view('product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->productRepository->update($request, $id);
        return redirect()->route('productIndex');
    }


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
