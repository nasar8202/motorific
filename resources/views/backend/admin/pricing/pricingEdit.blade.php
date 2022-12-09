
@extends('backend.admin.layouts.app')
@section('title','view Seat Material List')
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
                <h3>Vehicle</h3>
                <p class="text-subtitle text-muted">View All Vehicles List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pricing</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        
            
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Edit Pricing</h4>
                
                </div>
                <form action="{{route('pricingUpdate',$pricing->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Price From : </label>
                        <div class="form-group">
                            <input type="number" name="price_from" value="{{$pricing->price_from}}" placeholder="£"
                                class="form-control" required>
                                @if ($errors->has('price_from'))
                                                <span class="text-danger">{{ $errors->first('price_from') }}</span>
                                            @endif
                        </div>
                        <label>Price To : </label>
                        <div class="form-group">
                            <input type="number" name="price_to" value="{{$pricing->price_to}}" placeholder="£"
                                class="form-control" required>
                                @if ($errors->has('price_to'))
                                                <span class="text-danger">{{ $errors->first('price_to') }}</span>
                                            @endif
                        </div>
                        <label>Fee </label>
                        <div class="form-group">
                            <input type="number" name="fee" value="{{$pricing->fee}}" placeholder="£"
                                class="form-control" required>
                                @if ($errors->has('fee'))
                                                <span class="text-danger">{{ $errors->first('fee') }}</span>
                                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1"
                            >
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
            
        </div>

    </section>
</div>
<div class="modal fade text-left" id="inlineForm" tabindex="-1"
role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
    role="document">

</div>
</div>
@endsection
