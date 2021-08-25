<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginForm(){
        // \Mail::to('manhvh7601@gmail.com')->send(
        //     app()->make(\App\Mail\SendMail::class)
        // );
        $hotProducts = Product::orderBy('id', 'desc')->take(8)->get();
        return view('admin/auth/login', compact('hotProducts'));  
    }
    public function login(LoginRequest $request){
        $data = $request->only([
            'email', 
            'password'
        ]);

        $result = Auth::attempt($data);
        if($result === false){
            //err
            session()->flash('error','Sai email hoặc mật khẩu');
            return back();

        }else{

        }
        // dd($result);
        return redirect()->route('admin.categories.index');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
