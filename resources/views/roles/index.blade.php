@extends('layouts.master')

@section('title')
    SIMS | Roles
@endsection

@section('content')
    <!-- Page Header -->
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Roles</h4>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0 mt-2">
                    <li class="text-[0.813rem]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ url('/dashboard') }}">
                            <i class="bx bx-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">Roles</li>
                </ol>
            </nav>
        </div>
        <div class="flex items-center">
            <a href="{{ route('roles.create') }}" class="ti-btn ti-btn-primary">
                <i class="bx bx-plus me-1"></i> Add Role
            </a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">All Roles</h5>
                </div>
                <div class="box-body">

                    @if(session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-auto ti-custom-table table-bordered text-nowrap w-full whitespace-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">#</th>
                                    <th class="text-start">Role Name</th>
                                    <th class="text-start">Permissions</th>
                                    <th class="text-start">Users</th>
                                    <th class="text-start">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <span class="font-semibold">{{ $role->name }}</span>
                                        </td>
                                        <td>
                                            @if($role->permissions->count())
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach($role->permissions->take(4) as $perm)
                                                        <span class="badge bg-info/10 text-info text-xs">{{ $perm->name }}</span>
                                                    @endforeach
                                                    @if($role->permissions->count() > 4)
                                                        <span class="badge bg-secondary/10 text-secondary text-xs">+{{ $role->permissions->count() - 4 }} more</span>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-textmuted">No permissions</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-primary/10 text-primary">
                                                {{ $role->users()->count() }} user(s)
                                            </span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="ti-btn ti-btn-sm ti-btn-info">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                    onsubmit="return confirm('Delete role \'{{ $role->name }}\'? This cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ti-btn ti-btn-sm ti-btn-danger">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-textmuted">No roles found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
