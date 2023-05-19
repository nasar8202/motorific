
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
                <h3>Add Blog</h3>
                <p class="text-subtitle text-muted">Add Blog</p>
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

                                <form action="{{ route('addBlog') }}" method="POST" class="oveflow-x-scroll p-0" enctype="multipart/form-data">
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
                                             
                                                <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input type="text" id="title" class="form-control" placeholder="Enter title here" name="title" value="">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="slug">Slug</label>
                                                                <input type="text" id="slug" class="form-control" placeholder="Enter slug here" name="slug" value="">
                                                            </div>
                                                        </div>
                                                
                                                <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="short_description">Short Description</label>
                                                                <textarea class="form-control" placeholder="Enter short description here"
                                                                    id="short_description" name="short_description"></textarea>
                                                            </div>
                                                    </div>
                                                
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea name="long_description" id="default" cols="30" rows="10" placeholder="Enter the long description here"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="image">Image</label>
                                                        <div class="card-body">
                                                            <div class="form-floating">
                                                               <input type="file" id="image" name="image">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="meta_title">Meta Title</label>
                                                            <input type="text" id="meta_title" class="form-control" placeholder="Enter meta title here" name="meta_title" value="">
                                                        </div>
                                                    </div>
                                            <div class="col-6">
                                                  
                                                    <div class="form-group">
                                                          <div class="form-group">
                                                            <label for="meta_description">Meta Description</label>
                                                            <input type="text" id="meta_description" class="form-control" placeholder="Enter meta description here" name="meta_description" value="">
                                                        </div>
                                                            </div>
                                                            
                                            </div>    
                                            </div>    
                                    
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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
