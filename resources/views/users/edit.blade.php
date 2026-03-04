@extends('layouts.master')

@section('title')
    SIMS | Edit User
@endsection

@section('content')
    <!-- Page Header -->
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Edit User</h4>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0 mt-2">
                    <li class="text-[0.813rem]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ url('/dashboard') }}">
                            <i class="bx bx-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">
                        <a class="text-primary hover:text-primary" href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">
                        Edit User
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Form -->
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 xl:col-span-8">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Edit User: {{ $user->name }}</h5>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-12 gap-4">
                            <!-- Name -->
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter full name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter email address" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Role -->
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Role <span class="text-danger">*</span></label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="">Select role</option>
                                    @foreach (App\Models\User::ROLES as $role)
                                        <option value="{{ $role }}"
                                            {{ old('role', $user->role) === $role ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password (optional) -->
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">New Password <span class="text-textmuted text-xs">(leave blank to keep current)</span></label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter new password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mt-6">
                            <button type="submit" class="ti-btn ti-btn-primary">
                                <i class="bx bx-save me-1"></i> Update User
                            </button>
                            <a href="{{ route('users.index') }}" class="ti-btn ti-btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
