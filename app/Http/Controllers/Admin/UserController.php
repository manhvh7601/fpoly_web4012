<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

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
        $data = $request->except('_token');
        User::create($data);

        if ($request->ajax() == true) {
            return response()->json([
                'status' => 200,
                'message' => 'ok'
            ]);
        }

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

        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $data['password'];
        // $user->gender = $data['gender'];
        // $user->role = $data['role'];
        // $user->address = $data['address'];

        // $user->save();

        return redirect()->route('admin.users.index');
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
