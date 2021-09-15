<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $listUser = null;
        $listUser = User::latest()->paginate(10);
        $listUser = User::all();

        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $listUser = User::where('email', 'LIKE', "%$keyword%")->get();
        } else {
            $listUser = User::all();
        }

        $listUser->load(['invoices']);
        return view('admin/users/index', [
            'data' => $listUser,
        ]);
    }
    public function show(User $user)
    {
        return view('admin/users/show', ['user' => $user]);
    }
    public function create()
    {
        return view('admin/users/create-user');
    }
    public function store(StoreRequest $request)
    {
        $user = $request->except('_token');
        // if (User::where('email', '=', Input::get('email'))->exists()) {
        //     // user found
        //  }
        User::create($user);

        return redirect()->route('admin.users.index');
    }
    public function edit(User $user)
    {
        // dd($user);
        return view('admin/users/edit', ['data' => $user]);
    }
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->except('_token');
        $user->update($data);

        return redirect()->route('admin.users.index');
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
