<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $listProduct = Product::latest()->paginate(10);
        $listProduct = Product::all();


        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $listProduct = Product::where('name', 'LIKE', "%$keyword%")->paginate(10);
        } else {
            $listProduct = Product::latest()->paginate(10);
        }
        $listProduct->load(['category']);

        return view('admin/products/index', [
            'data' => $listProduct,
        ]);
    }
    public function show($id)
    {
    }
    public function create()
    {
        $lstCate = Category::all();
        return view('admin.products.add', ['lstCate' => $lstCate]);
    }
    public function store(ProductRequest $request)
    {
        $products = new Product;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload'), $filename);
            $products->image = $filename;
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'image' => $filename,
            'desc' => $request->desc
        ]);
        return redirect()->route('admin.products.index');
    }
    public function edit($id)
    {
        $data = Product::find($id);
        $lstCate = Category::all();
        return view('admin.products.edit', ['data' => $data, 'lstCate' => $lstCate]);
    }
    public function update(ProductUpdateRequest $request, $id)
    {
        $products = new Product;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload'), $filename);
            $products->image = $filename;
        }
        Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'image' => $filename,
            'desc' => $request->desc
        ]);

        return redirect()->route('admin.products.index');
    }
    public function delete($id)
    {
        $pro = Product::find($id);
        $pro->delete();

        return redirect()->route('admin.products.index');
    }
}
