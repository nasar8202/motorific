@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5>Product Detail</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('signup') }}" class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3>Step 3</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register.post.step.3') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">all makes: </label>
                        <input type="text" name="all_makes" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.all_makes') }}">
                        <label for="name">specific_makes: </label>
                        <input type="text" name="specific_makes" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.specific_makes') }}">
                        <label for="name">lowest_purchase_price: </label>
                        <input type="text" name="lowest_purchase_price" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.lowest_purchase_price') }}">
                        <label for="name">highest_purchase_price: </label>
                        <input type="text" name="highest_purchase_price" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.highest_purchase_price') }}">
                        <label for="name">age_range_from: </label>
                        <input type="text" name="age_range_from" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.age_range_from') }}">
                        <label for="name">age_range_from: </label>
                        <input type="text" name="age_range_from" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.age_range_from') }}">
                        <label for="name">age_range_to: </label>
                        <input type="text" name="age_range_to" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.age_range_to') }}">
                        <label for="name">mileage_from: </label>
                        <input type="text" name="mileage_from" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.mileage_from') }}">
                        <label for="name">mileage_to: </label>
                        <input type="text" name="mileage_to" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.mileage_to') }}">
                        <label for="name">how_far_distance: </label>
                        <input type="text" name="how_far_distance" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.how_far_distance') }}">
                        <label for="name">purchase_each_month_vehicles: </label>
                        <input type="text" name="purchase_each_month_vehicles" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.purchase_each_month_vehicles') }}">
                        <label for="name">any_thing_else: </label>
                        <input type="text" name="any_thing_else" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.any_thing_else') }}">
                        <a type="button" href="{{ route('signup') }}" class="btn btn-warning">Back to Step 1</a>
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
