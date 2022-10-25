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
                <h3>Step 2</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register.post.step.2') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">address line 1: </label>
                        <input type="text" name="address_line_1" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.address_line_1') }}">
                        <label for="name">address line 2: </label>
                        <input type="text" name="address_line_2" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.address_line_2') }}">
                        <label for="name">city: </label>
                        <input type="text" name="city" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.city') }}">
                        <label for="name">postcode: </label>
                        <input type="text" name="postcode" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.postcode') }}">
                        <label for="name">company type: </label>
                        <input type="text" name="company_type" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.company_type') }}">
                        <label for="name">website: </label>
                        <input type="text" name="website" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.website') }}">
                        <label for="name">company phone: </label>
                        <input type="text" name="company_phone" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.company_phone') }}">

                        <a type="button" href="{{ route('signup') }}" class="btn btn-warning">Back to Step 1</a>
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
