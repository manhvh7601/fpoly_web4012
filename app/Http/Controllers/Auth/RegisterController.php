<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegisterForm(){
        $hotProducts = Product::orderBy('id', 'desc')->take(8)->get();
        return view('admin/auth/register', compact('hotProducts'));
    }
    public function postRegisterForm(Request $request){
        $user = new User();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => $request->password,
            'role_id' => 1
        ]);
        $user->save();
        if ($user->id) {
            return redirect()->route('auth.getLoginForm')->with('success', 'Đăng kí tài khoản thành công! Vui lòng đăng nhập');
    }
         return redirect()->back();
    }
}
