
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
                <h3>blogs</h3>
                <p class="text-subtitle text-muted">View blogs List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">blogs </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                blogs List
                <a href="{{ route('addBlogForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Add blog </span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>blogs Title</th>
                            <th>blogs Short Description</th>
                            <th>blogs Meta Title</th>
                            <th>blogs Meta Description</th>
                            <th>blogs Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($allBlogs as $blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $blog->title}}</td>
                            <td>{{ $blog->short_description}}</td>
                            <td>{{ $blog->meta_title}}</td>
                            <td>{{ $blog->meta_description}}</td>
                            <td> <img src="{{ asset('/blogs/images/'.$blog->image) }}" width="100" height="100"></td>
                            <td>
                                <a href="{{ route('editBlogForm',$blog->id) }}"><span class="badge badge-success">Edit</span></a>
                                <a href="{{ route('deleteBlog',$blog->id) }}"><span class="badge badge-danger">Delete</span></a>
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
