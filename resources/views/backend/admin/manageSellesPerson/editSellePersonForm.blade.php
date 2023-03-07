
@extends('backend.admin.layouts.app')
@section('title','Edit Seller Person Form')
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
                <h3>Edit Seller Person Form</h3>
                <p class="text-subtitle text-muted">Edit Seller Person Form</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Seller Person </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-sm-0">
                    <h4 class="card-title">Edit Seller Person Form</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="container-fluid">

                            <div class="row">
                                <form action="{{ route('updateSellePerson',$sellePerson->id) }}" method="POST"  class="oveflow-x-scroll p-0">
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

                                    <table class="table table-bordered tables_admin_data " id="dynamicAddRemove">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Post Code</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="name" placeholder="Enter Title" value="{{ $sellePerson->name }}" class="form-control w-160" />
                                            </td>
                                            <td><input type="text" name="email" placeholder="Enter Title" value="{{ $sellePerson->email }}" disabled class="form-control w-160" />
                                            </td>
                                            <td><input type="text" name="post_code" placeholder="Enter Title" value="{{ $sellePerson->post_code }}" class="form-control w-160" />
                                            </td>
                                            <td><input type="text" name="phone_number" placeholder="Enter Title" value="{{ $sellePerson->phone_number }}" class="form-control w-160" />
                                            </td>
                                            

                                        </tr>
                                    </table>
                                    <button type="submit" class="btn btn-outline-success">Update</button>
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
