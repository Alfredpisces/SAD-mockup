@extends('layouts.master')

@section('title')
    SIMS | Permissions
@endsection

@section('content')
    <!-- Page Header -->
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Permissions</h4>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0 mt-2">
                    <li class="text-[0.813rem]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ url('/dashboard') }}">
                            <i class="bx bx-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="text-[0.813rem] before:content-['/'] before:mx-2 text-defaulttextcolor">Permissions</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">All Permissions</h5>
                </div>
                <div class="box-body">

                    <div class="table-responsive">
                        <table class="table table-auto ti-custom-table table-bordered text-nowrap w-full whitespace-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">#</th>
                                    <th class="text-start">Permission Name</th>
                                    <th class="text-start">Guard</th>
                                    <th class="text-start">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permissions as $index => $permission)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <span class="badge bg-primary/10 text-primary">{{ $permission->name }}</span>
                                        </td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td>{{ $permission->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-textmuted">No permissions found.</td>
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
