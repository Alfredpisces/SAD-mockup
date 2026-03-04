@extends('layouts.master')

@section('title')
    SIMS | Add User
@endsection

@section('content')
    <!-- Page Header -->
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Add User</h4>
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
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">Add User</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="xl:col-span-8 col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">User Information</h5>
                </div>
                <div class="box-body">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0 list-disc ps-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-12 gap-4">
                            <!-- Name -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="ti-form-input @error('name') border-danger @enderror"
                                    placeholder="Full name" required>
                                @error('name')
                                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="ti-form-input @error('email') border-danger @enderror"
                                    placeholder="email@example.com" required>
                                @error('email')
                                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="ti-form-input @error('phone') border-danger @enderror"
                                    placeholder="+1 234 567 8900">
                                @error('phone')
                                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Role -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Role</label>
                                <select name="role" class="ti-form-select @error('role') border-danger @enderror">
                                    <option value="">-- Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ old('role') == $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password"
                                    class="ti-form-input @error('password') border-danger @enderror"
                                    placeholder="Min 8 characters" required>
                                @error('password')
                                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation"
                                    class="ti-form-input"
                                    placeholder="Repeat password" required>
                            </div>

                            <!-- Status -->
                            <div class="xl:col-span-6 col-span-12">
                                <label class="ti-form-label mb-1">Status <span class="text-danger">*</span></label>
                                <select name="status" class="ti-form-select @error('status') border-danger @enderror">
                                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="ti-btn ti-btn-primary">
                                <i class="bx bx-save me-1"></i> Save User
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
