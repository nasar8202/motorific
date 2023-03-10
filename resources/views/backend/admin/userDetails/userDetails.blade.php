
@extends('backend.admin.layouts.app')
@section('title','view Vehicles Features List')
@section('secton')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Users</h3>
                <p class="text-subtitle text-muted">View All Users List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">


            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Post Code</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($viewUsers as $viewUser)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $viewUser->name }}</td>
                            <td>{{ $viewUser->email }}</td>
                            <td>{{ $viewUser->phone_number }}</td>
                            <td>{{ $viewUser->post_code }}</td>
                            <td>
                                <a href="{{ route('editUserForm',$viewUser->id) }}"><span class="badge badge-success">Edit</span></a>
                                @if ($viewUser->status == 1)
                                <a href="{{ route('deleteUser',$viewUser->id) }}"><span class="badge badge-danger">Disable</span></a>
                                @else
                                <a href="{{ route('enableUser',$viewUser->id) }}"><span class="badge badge-success">Enable</span></a>
                                @endif
                                @if ($viewUser->contact_status == 1)
                                <a href="#"><span class="badge badge-success">Already Contacted</span></a>
                                @else
                                <a href="{{ route('markAsContacted',$viewUser->id) }}"><span class="badge badge-danger">Mark As Contacted ✔</span></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
