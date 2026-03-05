@extends('layouts.master')

@section('title', 'SIMS | Role & User Database')

@section('content')
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Role & User Database</h4>
            <p class="-mt-[0.2rem] mb-0 text-textmuted">Overview of system users and their assigned roles.</p>
        </div>
        <div class="main-dashboard-header-right">
            <a href="{{ route('roles.create') }}" class="ti-btn ti-btn-primary !py-1 !px-2 !text-[0.75rem]">
                <i class="ri-add-line"></i> Add New Role
            </a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header">
                    <div class="box-title">Active User Access Control</div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder bg-light/30">
                                    <th scope="col" class="text-start">User</th>
                                    <th scope="col" class="text-start">Primary Role</th>
                                    <th scope="col" class="text-start">Email</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Loop through your users and their roles --}}
                                @forelse($users as $user)
                                    <tr class="border-b border-defaultborder hover:bg-gray-50">
                                        <th scope="row">
                                            <div class="flex items-center">
                                                <span class="avatar avatar-xs me-2 avatar-rounded">
                                                    <img src="{{ asset('backend/assets/images/faces/' . (($user->id % 15) + 1) . '.jpg') }}"
                                                        alt="img">
                                                </span>
                                                <span class="font-semibold text-defaulttextcolor">{{ $user->name }}</span>
                                            </div>
                                        </th>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge bg-primary/10 text-primary">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-textmuted">{{ $user->email }}</td>
                                        <td>
                                            <div class="hstack gap-2">
                                                <a href="#" class="text-info text-[1.1rem]"><i
                                                        class="ri-edit-line"></i></a>
                                                <a href="#" class="text-danger text-[1.1rem]"><i
                                                        class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Temporary static placeholder if no data is found --}}
                                    <tr>
                                        <th scope="row">
                                            <div class="flex items-center">
                                                <span class="avatar avatar-xs me-2 avatar-rounded">
                                                    <img src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                                                        alt="img">
                                                </span>
                                                <span class="font-semibold text-defaulttextcolor">Admin User</span>
                                            </div>
                                        </th>
                                        <td><span class="badge bg-danger/10 text-danger">Super Admin</span></td>
                                        <td class="text-textmuted">admin@sims.edu</td>
                                        <td>
                                            <div class="hstack gap-2">
                                                <i class="ri-edit-line text-info"></i>
                                                <i class="ri-delete-bin-line text-danger"></i>
                                            </div>
                                        </td>
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
