@extends('layouts.master')

@section('title')
    SIMS | Users
@endsection

@section('content')
    <!-- Page Header -->
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Users</h4>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0 mt-2">
                    <li class="text-[0.813rem]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ url('/dashboard') }}">
                            <i class="bx bx-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">
                        Users
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex items-center">
            <a href="{{ url('/users/create') }}" class="ti-btn ti-btn-primary">
                <i class="bx bx-plus me-1"></i> Add User
            </a>
        </div>
    </div>

    <!-- Users Table -->
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header flex items-center justify-between">
                    <h5 class="box-title">All Users</h5>
                    <form method="GET" action="{{ route('users.index') }}" class="flex items-center gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="ti-form-input w-48" placeholder="Search name or email...">
                        <button type="submit" class="ti-btn ti-btn-primary ti-btn-sm">Search</button>
                        @if(request('search'))
                            <a href="{{ route('users.index') }}" class="ti-btn ti-btn-secondary ti-btn-sm">Clear</a>
                        @endif
                    </form>
                </div>
                <div class="box-body">

                    @if(session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table
                            class="table table-auto ti-custom-table table-bordered text-nowrap w-full whitespace-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">#</th>
                                    <th class="text-start">Name</th>
                                    <th class="text-start">Email</th>
                                    <th class="text-start">Role</th>
                                    <th class="text-start">Status</th>
                                    <th class="text-start">Created</th>
                                    <th class="text-start">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="flex items-center">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-primary text-white">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </span>
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge bg-primary/10 text-primary">
                                                {{ $user->roles->first()?->name ?? 'No Role' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($user->status === 'active')
                                                <span class="badge bg-success/10 text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger/10 text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                <a href="{{ url('/users/' . $user->id . '/edit') }}"
                                                    class="ti-btn ti-btn-sm ti-btn-info">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <form action="{{ url('/users/' . $user->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
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
                                        <td colspan="7" class="text-center text-textmuted">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($users->hasPages())
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
