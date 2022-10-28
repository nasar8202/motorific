
@extends('backend.admin.layouts.app')
@section('title','Edit Seat Material Form')
@section('secton')
<style>
    .container {
          max-width: 1200px;
      }
  </style>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Seat Material Form</h3>
                <p class="text-subtitle text-muted">Edit Seat Material Form</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Seat Material </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Seat Material Form</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="container">

                            <div class="row">
                                <form action="{{ route('updatePrivatePlate',$editPrivatePlate->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <th>Title</th>
                                            <th>Image Upload</th>
                                            <th>Image</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="title" placeholder="Enter Title" value="{{ $editPrivatePlate->title }}" class="form-control" />
                                            </td>
                                            <td><input type="file" name="image" value="{{ $editPrivatePlate->image }}" placeholder="Enter Title" class="form-control" />
                                            </td>
                                            <td><img src="{{ asset('/plates/private_plate_iamges/'.$editPrivatePlate->image) }}" width="100" height="80"></td>

                                        </tr>
                                    </table>
                                    <button type="submit" class="btn btn-outline-success btn-block">Save</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@endsection
