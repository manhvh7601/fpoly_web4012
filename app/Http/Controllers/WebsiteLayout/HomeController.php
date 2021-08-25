<?php

namespace App\Http\Controllers\WebsiteLayout;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $hotProducts = Product::orderBy('id', 'desc')->take(8)->get();
        $hotProducts->load('category');
        return view('welcome', compact('hotProducts'));
    }
    public function shop(Request $request)
    {
        $category = Category::all();
        $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%");

        if ($request->has('price') && $request->price > 0) {
            if ($request->price == 1) {
                $productQuery = $productQuery->orderBy('price');
            } else {
                $productQuery = $productQuery->orderByDesc('price');
            }
        }
        if($request->has('keyword') == true ){
            $keyword = $request->get('keyword');
            $products = Product::where('name', 'LIKE', "%$keyword%")->paginate(9);
        }
        $products = $productQuery->paginate(9);
        return view('shop', compact('products', 'category'));
    }
    public function detail(Request $request, $id)
    {
        $hotProducts = Product::find($id);
        $hotProducts->load('category');

        $hotProducts = Product::where("id", "=", "$id")->get();
        $relatedProduct = Product::orderBy('id', 'desc')->take(4)->get();

        return view('detail', compact('hotProducts', 'relatedProduct'));
    }
    
    public function category(Request $request ,$id)
    {
        $category = Category::all();
        $products = Product::where('category_id', $id)->latest()->paginate(9);
        $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%");

        if ($request->has('price') && $request->price > 0) {
            if ($request->price == 1) {
                $productQuery = $productQuery->orderBy('price');
            } else {
                $productQuery = $productQuery->orderByDesc('price');
            }
        }
        $products = $productQuery->paginate(9);
        $category->load('products');
        return view('shop', compact('category', 'products'));
    }
}
