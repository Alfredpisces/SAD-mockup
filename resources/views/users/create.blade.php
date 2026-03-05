@extends('layouts.master')

@section('title', 'SIMS | Add User')

@section('content')
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Add New User</h4>
            <p class="-mt-[0.2rem] mb-0 text-textmuted">Create a new system user and assign their access level.</p>
        </div>
        <div class="main-dashboard-header-right">
            <a href="{{ route('users.index') }}" class="ti-btn ti-btn-danger !py-1 !px-2 !text-[0.75rem]">
                <i class="ri-arrow-go-back-line"></i> Back to Users
            </a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 xl:col-span-6">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">User Information</h5>
                </div>
                <div class="box-body">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="bg-danger/10 border border-danger text-danger p-3 rounded mb-4 text-sm">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label text-sm font-semibold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required placeholder="e.g. Jane Doe">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label text-sm font-semibold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required placeholder="e.g. jane@example.com">
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="password" class="form-label text-sm font-semibold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Minimum 8 characters">
                            </div>
                            <div>
                                <label for="password_confirmation" class="form-label text-sm font-semibold">Confirm
                                    Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required placeholder="Retype password">
                            </div>
                        </div>

                        {{-- Uncomment this when you add Roles --}}
                        {{--
                        <div class="mb-4">
                            <label for="role" class="form-label text-sm font-semibold">Assign Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="" disabled selected>Select a role...</option>
                                <option value="admin">Administrator</option>
                                <option value="manager">Manager</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        --}}

                        <div class="mt-4">
                            <button type="submit" class="ti-btn ti-btn-primary">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
