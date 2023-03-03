
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
                
                <p class="text-subtitle text-muted">Add Selles Person</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Selles Person</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
        <br>
    <form class="form" method="post" action="{{route('StoreSellesPerson')}}" enctype="multipart/form-data">
        @csrf
    <section id="multiple-column-form">
        <div class="row align-items-center">
            <div class="col-md-6 col-6">
                
                </div> 

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Seller Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Seller  Name</label>
                                            <input type="name" id="first-name-column" class="form-control"
                                                placeholder="Seller first name" name="name" value="{{old('name')}}">
                                        </div>
                                        @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Seller Email</label>
                                            <input type="email" id="city-column" class="form-control"
                                                placeholder="Enter seller email" name="email" value="{{old('email')}}">
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Phone Number</label>
                                            <input type="number" id="country-floating" class="form-control"
                                                name="phone_number" placeholder="Phone number" value="{{old('phone_number')}}">
                                        </div>
                                        @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Post Code </label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Enter Post Code" name="post_code" value="{{old('post_code')}}">
                                        </div>
                                        @if ($errors->has('post_code'))
                                        <span class="text-danger">{{ $errors->first('post_code') }}</span>
                                    @endif
                                    </div>
                                    
                                </div>
                                
                        </div>
                        
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit"
                            class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset"
                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </section>
   
   
</form>
</div>
<script type="text/javascript">
  
</script>
@endsection
