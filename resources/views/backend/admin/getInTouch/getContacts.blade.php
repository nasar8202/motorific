
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
                <h3>Get In Touch</h3>
                <p class="text-subtitle text-muted">get in Touch</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Get In Touch </li>
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
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($getInTouchs as $getInTouch)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $getInTouch->name}}</td>
                            <td>{{ $getInTouch->email}}</td>
                            <td>{{ $getInTouch->description}}</td>
                            <td>
                                @if($getInTouch->status == 1)
                                <a href="{{route('updateGetInTouch',$getInTouch->id)}}"><span class="badge badge-danger">Mark As Contacted ✔</span></a>
                                @else
                                <a><span class="badge badge-success">Already Contacted</span></a>
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