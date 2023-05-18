
@extends('backend.admin.layouts.app')
@section('title','add wheel nut ')
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
                <a href="{{ route('viewAllSubscribers') }}"><span class="badge badge-success">Go Back</span></a>
                <h3>Edit Blog</h3>
                <p class="text-subtitle text-muted">Edit Blog</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vehicle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body">
                        <div class="container-fluid">

                            <div class="row">

                                <form action="{{ route('updateBlog',$editBlog->id) }}" method="POST" class="oveflow-x-scroll p-0" enctype="multipart/form-data">
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
                                    
                                             <div class="row">
                                             
                                                <div class="col-12">
                                                <div class="card-body">

                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="enter title here"
                                                                    id="floatingTextarea" name="title" >{{$editBlog->title}}</textarea>
                                                                <label for="floatingTextarea">title</label>
                                                            </div>
                                                            </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                        <div class="card-body">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="enter short description here"
                                                                    id="floatingTextarea" name="short_description">{{$editBlog->short_description}}</textarea>
                                                                <label for="floatingTextarea">Short Description</label>
                                                            </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                        <div class="card-body">
                                                            <textarea name="long_description" id="default" cols="30" rows="10" placeholder="enter the long description here">{{$editBlog->long_description}}</textarea>
                                                        </div>
                                                    </div>
                                                <div class="col-12">
                                                    <label for="image">Image</label>
                                                        <div class="card-body">
                                                            <div class="form-floating">
                                                               <input type="file" name="image" id="image">
                                                            </div>
                                                        </div>
                                                    <img src="{{ asset('/blogs/images/'.$editBlog->image) }}" width="100" height="100">
                                                </div>
                                            <div class="col-12">
                                                        <div class="card-body">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="enter meta title here"
                                                                    id="floatingTextarea" name="meta_title">{{$editBlog->meta_title}}</textarea>
                                                                <label for="floatingTextarea">Meta Title</label>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="col-12">
                                                        <div class="card-body">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="enter meta description here"
                                                                    id="floatingTextarea" name="meta_description">{{$editBlog->meta_description}}</textarea>
                                                                <label for="floatingTextarea">Meta Description</label>
                                                            </div>
                                                        </div>
                                            </div>    
                                    
                                    <button type="submit" class="btn btn-outline-success">Save</button>
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
