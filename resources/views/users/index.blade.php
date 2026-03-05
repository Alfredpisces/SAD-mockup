@extends('layouts.master')

@section('title')
    SIMS | User Management
@endsection

@section('content')
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">User Management</h4>
            <p class="-mt-[0.2rem] mb-0 text-textmuted">Manage all registered users in the system.</p>
        </div>
        <div class="main-dashboard-header-right">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </div>
    </div>
    @if (session('success'))
        <div class="bg-success/10 border border-success text-success px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">
                        All Users Database
                    </div>
                    <div>
                        <a href="{{ route('users.create') }}"
                            class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">
                            <i class="ri-add-line ms-1 inline-block align-middle"></i> Add New User
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder bg-light/30">
                                    <th scope="col" class="text-start">User</th>
                                    <th scope="col" class="text-start">Status</th>
                                    <th scope="col" class="text-start">Email</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr class="border-b border-defaultborder hover:bg-gray-50 dark:hover:bg-black/20">
                                        <th scope="row">
                                            <div class="flex items-center">
                                                <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                    <img src="{{ asset('backend/assets/images/faces/' . (($user->id % 15) + 1) . '.jpg') }}"
                                                        alt="img">
                                                </span>
                                                <span class="font-semibold text-defaulttextcolor">{{ $user->name }}</span>
                                            </div>
                                        </th>
                                        <td>
                                            <span class="badge bg-success/10 text-success">Active</span>
                                        </td>
                                        <td class="text-textmuted">{{ $user->email }}</td>
                                        <td>
                                            <div class="hstack gap-2 flex-wrap">
                                                <a aria-label="Edit User" href="#"
                                                    class="text-info text-[1.1rem] leading-none transition-transform hover:scale-110">
                                                    <i class="ri-edit-line"></i>
                                                </a>

                                                <form action="#" method="POST" class="inline m-0 p-0"
                                                    onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button aria-label="Delete User" type="submit"
                                                        class="text-danger text-[1.1rem] leading-none transition-transform hover:scale-110">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-gray-500">
                                            No users have been registered yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($users->hasPages())
                    <div class="box-footer border-t-0 p-4">
                        {{ $users->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('title')
    SIMS | Tables
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/prismjs/themes/prism-coy.min.css') }}">
@endpush

@section('content')
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Tables</h4>
            <p class="-mt-[0.2rem] mb-0 text-textmuted">A collection of different table styles.</p>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-6 col-span-12">
            <div class="box custom-box">
                <div class="box-header !pb-3 !border-b flex justify-between">
                    <div class="box-title">
                        Basic Tables
                    </div>
                    <div class="prism-toggle">
                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show
                            Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                    </div>
                </div>
                <div class="box-body !p-0">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">Name</th>
                                    <th scope="col" class="text-start">Created On</th>
                                    <th scope="col" class="text-start">Number</th>
                                    <th scope="col" class="text-start">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row" class="text-start">Mark</th>
                                    <td>21,Dec 2021</td>
                                    <td>+1234-12340</td>
                                    <td><span class="badge bg-outline-primary">Completed</span></td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row" class="text-start">Monika</th>
                                    <td>29,April 2022</td>
                                    <td>+1523-12459</td>
                                    <td><span class="badge bg-outline-warning">Failed</span></td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row" class="text-start">Madina</th>
                                    <td>30,Nov 2022</td>
                                    <td>+1982-16234</td>
                                    <td><span class="badge bg-outline-success">Successful</span></td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row" class="text-start">Bhamako</th>
                                    <td>18,Mar 2022</td>
                                    <td>+1526-10729</td>
                                    <td><span class="badge bg-outline-secondary">Pending</span></td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row" class="text-start">Samantha Julia</th>
                                    <td>18,May 2021</td>
                                    <td>+1626-12759</td>
                                    <td><span class="badge bg-outline-secondary">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer hidden border-t-0">
                </div>
            </div>
        </div>
        <div class="xl:col-span-6 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">
                        Bordered Tables
                    </div>
                    <div class="prism-toggle">
                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show
                            Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">User</th>
                                    <th scope="col" class="text-start">Status</th>
                                    <th scope="col" class="text-start">Email</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row">
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/13.jpg') }}"
                                                    alt="img">
                                            </span>Sukuro Kim
                                        </div>
                                    </th>
                                    <td><span class="badge bg-success/10 text-success">Active</span></td>
                                    <td>kimosukuro@gmail.com</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-info text-[.875rem] leading-none"><i
                                                    class="ri-edit-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-danger text-[.875rem] leading-none"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row">
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 offline avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                                                    alt="img">
                                            </span>Hasimna
                                        </div>
                                    </th>
                                    <td><span class="badge bg-light text-dark">Inactive</span></td>
                                    <td>hasimna2132@gmail.com</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-info text-[.875rem] leading-none"><i
                                                    class="ri-edit-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-danger text-[.875rem] leading-none"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row">
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/15.jpg') }}"
                                                    alt="img">
                                            </span>Azimo Khan
                                        </div>
                                    </th>
                                    <td><span class="badge bg-success/10 text-success">Active</span></td>
                                    <td>azimokhan421@gmail.com</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-info text-[.875rem] leading-none"><i
                                                    class="ri-edit-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-danger text-[.875rem] leading-none"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/5.jpg') }}"
                                                    alt="img">
                                            </span>Samantha Julia
                                        </div>
                                    </th>
                                    <td><span class="badge bg-success/10 text-success">Active</span></td>
                                    <td>julianasams143@gmail.com</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-info text-[.875rem] leading-none"><i
                                                    class="ri-edit-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="text-danger text-[.875rem] leading-none"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-4 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">Bordered Primary</div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table
                            class="table whitespace-nowrap table-bordered table-bordered-primary border-primary/10 min-w-full">
                            <thead>
                                <tr class="border-b !border-primary/30">
                                    <th scope="col" class="text-start">Order</th>
                                    <th scope="col" class="text-start">Date</th>
                                    <th scope="col" class="text-start">Customer</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-start">#0007</th>
                                    <td><span class="badge bg-light text-dark">26-04-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/3.jpg') }}"
                                                    alt="img">
                                            </span>Mayor Kelly
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary/10 text-primary">Booked</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">#0008</th>
                                    <td><span class="badge bg-light text-dark">15-02-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                                                    alt="img">
                                            </span>Wicky Kross
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary/10 text-primary">Booked</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">#0009</th>
                                    <td><span class="badge bg-light text-dark">23-05-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/1.jpg') }}"
                                                    alt="img">
                                            </span>Julia Cam
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary/10 text-primary">Booked</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:col-span-4 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">Bordered Success</div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered table-bordered-success min-w-full">
                            <thead>
                                <tr class="border-b !border-success/30">
                                    <th scope="col" class="text-start">Order</th>
                                    <th scope="col" class="text-start">Date</th>
                                    <th scope="col" class="text-start">Customer</th>
                                    <th scope="col" class="text-start">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-start">#0011</th>
                                    <td><span class="badge bg-light text-dark">07-01-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/10.jpg') }}"
                                                    alt="img">
                                            </span>Helsenky
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success/10 text-success">Delivered</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">#0012</th>
                                    <td><span class="badge bg-light text-dark">18-05-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/14.jpg') }}"
                                                    alt="img">
                                            </span>Brodus
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success/10 text-success">Delivered</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">#0013</th>
                                    <td><span class="badge bg-light text-dark">19-03-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/12.jpg') }}"
                                                    alt="img">
                                            </span>Chikka Alen
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success/10 text-success">Delivered</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:col-span-4 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">Bordered warning</div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered table-bordered-warning min-w-full">
                            <thead>
                                <tr class="border-b !border-warning/30">
                                    <th scope="col" class="text-start">Order</th>
                                    <th scope="col" class="text-start">Date</th>
                                    <th scope="col" class="text-start">Customer</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-start">#0014</th>
                                    <td><span class="badge bg-light text-dark">21-02-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/13.jpg') }}"
                                                    alt="img">
                                            </span>Sukuro Kim
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning/10 text-warning">Accepted</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">#0018</th>
                                    <td><span class="badge bg-light text-dark">26-03-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/11.jpg') }}"
                                                    alt="img">
                                            </span>Alex Carey
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning/10 text-warning">Accepted</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">#0020</th>
                                    <td><span class="badge bg-light text-dark">14-03-2022</span></td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/2.jpg') }}"
                                                    alt="img">
                                            </span>Pamila Anderson
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning/10 text-warning">Accepted</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header !pb-3 !border-b flex justify-between">
                    <div class="box-title">Hoverable Rows</div>
                </div>
                <div class="box-body !p-0">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-hover min-w-full ti-custom-table-hover">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">Product Manager</th>
                                    <th scope="col" class="text-start">Category</th>
                                    <th scope="col" class="text-start">Team</th>
                                    <th scope="col" class="text-start">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-defaultborder ">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="avatar avatar-sm me-2 avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/10.jpg') }}"
                                                    alt="img">
                                            </div>
                                            <div>
                                                <div class="leading-none"><span>Joanna Smith</span></div>
                                                <div class="leading-none"><span
                                                        class="text-[0.6875rem] text-textmuted">joannasmith14@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary/10 text-primary">Fashion</span></td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/2.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/8.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/2.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+5</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[52%]" aria-valuenow="52"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder ">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="avatar avatar-sm me-2 avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/2.jpg') }}"
                                                    alt="img">
                                            </div>
                                            <div>
                                                <div class="leading-none"><span>Kara Kova</span></div>
                                                <div class="leading-none"><span
                                                        class="text-[0.6875rem] text-textmuted">milesakara@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning/10 text-warning">Clothing</span></td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/4.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+6</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-2/5" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder ">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="avatar avatar-sm me-2 avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/16.jpg') }}"
                                                    alt="img">
                                            </div>
                                            <div>
                                                <div class="leading-none"><span>Donald Trimb</span></div>
                                                <div class="leading-none"><span
                                                        class="text-[0.6875rem] text-textmuted">donaldo21@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-black/10 text-black dark:text-white">Electronics</span></td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/1.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/11.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/15.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+2</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[17%]" aria-valuenow="17"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder ">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="avatar avatar-sm me-2 avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/13.jpg') }}"
                                                    alt="img">
                                            </div>
                                            <div>
                                                <div class="leading-none"><span>Justin Gaethje</span></div>
                                                <div class="leading-none"><span
                                                        class="text-[0.6875rem] text-textmuted">justingae@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger/10 text-danger">Sports</span></td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/4.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+5</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[72%]" aria-valuenow="72"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">Always responsive</div>
                </div>
                <div class="box-body !p-0">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            id="checkboxNoLabel" value="" aria-label="..."></th>
                                    <th scope="col" class="text-start">Team Head</th>
                                    <th scope="col" class="text-start">Category</th>
                                    <th scope="col" class="text-start">Role</th>
                                    <th scope="col" class="text-start">Gmail</th>
                                    <th scope="col" class="text-start">Team</th>
                                    <th scope="col" class="text-start">Work Progress</th>
                                    <th scope="col" class="text-start">Revenue</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row"><input class="form-check-input" type="checkbox"
                                            id="checkboxNoLabel1" value="" aria-label="..."></th>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/3.jpg') }}"
                                                    alt="img">
                                            </span>Mayor Kelly
                                        </div>
                                    </td>
                                    <td>Manufacturer</td>
                                    <td><span class="badge bg-primary/10 text-primary">Team Lead</span></td>
                                    <td>mayorkrlly@gmail.com</td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/2.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/8.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/2.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+4</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[52%]" aria-valuenow="52"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>$10,984.29</td>
                                    <td>
                                        <div class="hstack flex gap-3 text-[.9375rem]">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-success-full"><i
                                                    class="ri-download-2-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-info-full"><i
                                                    class="ri-edit-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row"><input class="form-check-input" type="checkbox"
                                            id="checkboxNoLabel2" value="" aria-label="..."></th>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/12.jpg') }}"
                                                    alt="img">
                                            </span>Andrew Garfield
                                        </div>
                                    </td>
                                    <td>Managing Director</td>
                                    <td><span class="badge bg-warning/10 text-warning">Director</span></td>
                                    <td>andrewgarfield@gmail.com</td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/1.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/5.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/11.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/15.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+4</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[91%]" aria-valuenow="91"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>$1.4billion</td>
                                    <td>
                                        <div class="hstack flex gap-3 text-[.9375rem]">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-success-full"><i
                                                    class="ri-download-2-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-info-full"><i
                                                    class="ri-edit-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row"><input class="form-check-input" type="checkbox"
                                            id="checkboxNoLabel3" value="" aria-label="..."></th>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/14.jpg') }}"
                                                    alt="img">
                                            </span>Simon Cowel
                                        </div>
                                    </td>
                                    <td>Service Manager</td>
                                    <td><span class="badge bg-success/10 text-success">Manager</span></td>
                                    <td>simoncowel234@gmail.com</td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/16.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+10</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[45%]" aria-valuenow="45"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>$7,123.21</td>
                                    <td>
                                        <div class="hstack flex gap-3 text-[.9375rem]">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-success-full"><i
                                                    class="ri-download-2-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-info-full"><i
                                                    class="ri-edit-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-defaultborder">
                                    <th scope="row"><input class="form-check-input" type="checkbox"
                                            id="checkboxNoLabel13" value="" aria-label="..."></th>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/5.jpg') }}"
                                                    alt="img">
                                            </span>Mirinda Hers
                                        </div>
                                    </td>
                                    <td>Recruiter</td>
                                    <td><span class="badge bg-danger/10 text-danger">Employee</span></td>
                                    <td>mirindahers@gmail.com</td>
                                    <td>
                                        <div class="avatar-list-stacked flex items-center -space-x-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/3.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/10.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('backend/assets/images/faces/14.jpg') }}"
                                                    alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-white avatar-rounded"
                                                href="javascript:void(0);">+6</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary w-[21%]" aria-valuenow="21"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>$2,325.45</td>
                                    <td>
                                        <div class="hstack flex gap-3 text-[.9375rem]">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-success-full"><i
                                                    class="ri-download-2-line"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="ti-btn ti-btn-icon ti-btn-sm ti-btn-info-full"><i
                                                    class="ri-edit-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('backend/assets/js/prism-custom.js') }}"></script>
@endpush
