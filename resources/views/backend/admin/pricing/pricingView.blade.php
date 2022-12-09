
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
                        <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                Add New Pricing
            </button>
            </div>
            

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Price from</th>
                            <th>Price To</th>
                            <th>Fee</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pricing as $key=> $price)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>£ {{$price->price_from}} </td>
                            <td>£ {{$price->price_to}}</td>
                            <td>£ {{$price->fee}}</td>
                            
                            <td>
                                <a href="{{route('pricingEdit',$price->id)}}" class="badge badge-success">Edit</a>
                                <a href="{{route('pricingDelete',$price->id)}}" class="badge badge-danger">Delete</a>
                            
                            </td>
                        </form>
                        </tr>
                        @empty
                        @endforelse
                    
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<div class="modal fade text-left" id="inlineForm" tabindex="-1"
role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33">Add Pricing</h4>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form action="{{route('pricingCreate')}}" method="POST">
            @csrf
            <div class="modal-body">
                <label>Price From : </label>
                <div class="form-group">
                    <input type="number" name="price_from" placeholder="£"
                        class="form-control" required>
                        @if ($errors->has('price_from'))
                                        <span class="text-danger">{{ $errors->first('price_from') }}</span>
                                    @endif
                </div>
                <label>Price To : </label>
                <div class="form-group">
                    <input type="number" name="price_to" placeholder="£"
                        class="form-control" required>
                        @if ($errors->has('price_to'))
                                        <span class="text-danger">{{ $errors->first('price_to') }}</span>
                                    @endif
                </div>
                <label>Fee </label>
                <div class="form-group">
                    <input type="number" name="fee" placeholder="£"
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
</div>
@endsection
