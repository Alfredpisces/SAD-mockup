@extends('layouts.master')

@section('title', 'SIMS | Permissions')

@section('content')
    <div class="md:flex block items-center justify-between my-6 page-header-breadcrumb">
        <div>
            <h4 class="mb-0 text-defaulttextcolor font-medium">Permissions Library</h4>
            <p class="-mt-[0.2rem] mb-0 text-textmuted">Manage individual system access rights.</p>
        </div>
        <div class="main-dashboard-header-right">
            <a href="#" class="ti-btn ti-btn-primary !py-1 !px-2 !text-[0.75rem]">
                <i class="ri-add-line"></i> Add Permission
            </a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 xl:col-span-8">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Available Permissions</h5>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table
                            class="table table-auto ti-custom-table table-striped table-bordered mb-0 text-nowrap w-full !border-defaultborder dark:!border-defaultborder/10">
                            <thead>
                                <tr>
                                    <th class="text-start !text-xs">Permission Key</th>
                                    <th class="text-start !text-xs">Description</th>
                                    <th class="text-start !text-xs">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-medium text-success">view_dashboard</td>
                                    <td class="text-textmuted">Can view the main analytics dashboard</td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium text-success">manage_users</td>
                                    <td class="text-textmuted">Can add, edit, or delete users</td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium text-success">view_student_records</td>
                                    <td class="text-textmuted">Can access academic and behavioral data</td>
                                    <td>
                                        <a href="#" class="text-danger"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 xl:col-span-4">
            <div class="box bg-primary/10 !border-primary/20">
                <div class="box-body">
                    <h6 class="font-semibold text-primary mb-2"><i class="ri-information-line"></i> How Permissions Work
                    </h6>
                    <p class="text-sm text-textmuted">
                        Instead of assigning permissions directly to users, assign these individual permissions to
                        <strong>Roles</strong>. Then, simply assign a Role to a User. This keeps role-based access control
                        (RBAC) clean and easy to manage.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
