@extends('layouts.master')

@section('title')
    SIMS | Edit Role
@endsection

@section('content')
    <!-- Page Header -->
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Edit Role</h4>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0 mt-2">
                    <li class="text-[0.813rem]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ url('/dashboard') }}">
                            <i class="bx bx-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">
                        <a class="text-primary hover:text-primary" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">Edit Role</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="xl:col-span-8 col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Edit: {{ $role->name }}</h5>
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

                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Role Name -->
                        <div class="mb-4">
                            <label class="ti-form-label mb-1">Role Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $role->name) }}"
                                class="ti-form-input @error('name') border-danger @enderror"
                                placeholder="e.g. Manager" required>
                            @error('name')
                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Permissions -->
                        <div class="mb-4">
                            <label class="ti-form-label mb-2">Permissions</label>
                            @php
                                $currentPermissions = old('permissions', $role->permissions->pluck('name')->toArray());
                            @endphp
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                @foreach ($permissions as $permission)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                            {{ in_array($permission->name, $currentPermissions) ? 'checked' : '' }}
                                            class="ti-form-checkbox">
                                        <span class="text-sm">{{ $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('permissions')
                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="ti-btn ti-btn-primary">
                                <i class="bx bx-save me-1"></i> Update Role
                            </button>
                            <a href="{{ route('roles.index') }}" class="ti-btn ti-btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
