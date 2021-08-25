@extends('layout')
@section('title', 'Add User')

@section('content')
<form action="{{ route('admin.users.store') }}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{ old('name') }}">
    </div>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div>
        <label>Password</label>
        <input class="mt-3 form-control" type="password" name="password">
    </div>
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div>
        <label>Email</label>
        <input class="mt-3 form-control" type="text" name="email" value="{{ old('email') }}">
    </div>
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div>
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address" value="{{ old('address') }}">
    </div>
    @error('address')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div>
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="{{ config('common.user.gender.male') }}"
                {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.male') ? 'selected' : '' }}>
                Male</option>
            <option value="{{ config('common.user.gender.female') }}"
                {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.female') ? 'selected' : '' }}>
                Female</option>
        </select>
    </div>
    @error('gender')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div>
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="{{ config('common.user.role.user') }}"
                {{ old('role', config('common.user.role.user')) == config('common.user.role.user') ? 'selected' : '' }}>
                User</option>
            <option value="{{ config('common.user.role.admin') }}"
                {{ old('role', config('common.user.role.user')) == config('common.user.role.admin') ? 'selected' : '' }}>
                Admin</option>
        </select>
    </div>
    @error('role')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <button class="mt-3 btn btn-primary">ADD USER</button>
</form>
@endsection
