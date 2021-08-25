<?php

namespace App\Http\Controllers\WebsiteLayout;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $cart = $request->session()->get(CART) ? $request->session()->get(CART) : [];
        return view('cart', compact('cart'));
    }
    public function addCart($id, Request $request)
    {
        $cart = $request->session()->get(CART) ? $request->session()->get(CART) : [];
        $product = Product::find($id);
        $product->load('category');
        $product = $product->toArray();

        $existedIndex = -1;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                $existedIndex = $i;
                break;
            }
        }
        if ($existedIndex == -1) {
            $product['quantity'] = 1;
            array_push($cart, $product);
        } else {
            $cart[$existedIndex]['quantity'] += 1;
        }

        $request->session()->put(CART, $cart);
        return redirect()->back()->with('success', 'Bạn đã thêm giỏ hàng thành công!');
    }
    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $key = $request->key;
        $cart = $request->session()->get(CART) ? $request->session()->get(CART) : [];
        if(isset($cart[$key])){
            $cart[$key]['quantity'] = $quantity;
            session()->put(CART, $cart);
        }
        return response()->json(['message' => "success"]);
    }

    public function removeCart(Request $request)
    {
        if ($request->id) {
            $cart = $request->session()->get(CART) ? $request->session()->get(CART) : [];

            foreach($cart as $key => $infoCart){
                if($request->id == $infoCart['id']){
                    unset($cart[$key]);
                    continue;
                }
            }
            session()->put(CART, $cart);
            return redirect('cart');
        }
    }
    public function checkout(Request $request)
    {
        $cart = $request->session()->get(CART) ? $request->session()->get(CART) : [];
        return view('checkout', compact('cart'));
    }
    public function paymentComplete()
    {
        return view('paymentcomplete');
    }
    public function payment(Request $request)
    {
        $hotProducts = Product::orderBy('id', 'desc')->take(8)->get();
        $hotProducts->load('category');
        $cart = $request->session()->get(CART);
        $invoice = new Invoice();
        $data = $request->all();
        unset($data['_token']);
        $invoice->fill($data);

        if (isset($cart) && $invoice->save()) {
            $sessionCart = $cart;
            foreach ($sessionCart as $item) {
                $invoiceDetail = new InvoiceDetail();
                $invoiceDetail->invoice_id = $invoice->id;
                $invoiceDetail->product_id = $item['id'];
                $invoiceDetail->quantity = $item['quantity'];
                $invoiceDetail->unit_price = $item['price'];
                $invoiceDetail->save();
            }
            $request->session()->remove(CART);
            return view('paymentComplete', compact('hotProducts'));
        } else {
            return redirect()->back()->with('error', 'Lỗi thanh toán!');
            return view('cart');
        }
    }
}
