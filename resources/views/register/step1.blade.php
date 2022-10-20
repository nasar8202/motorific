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
                        asdasd
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3>Step 1</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register.post.step.1') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" name="full_name" class="form-control mb-2"  placeholder="Enter name" value="{{ session()->get('register.full_name') }}">
                        <label for="name">Cpomany Name: </label>
                        <input type="text" name="company_name" class="form-control mb-2" placeholder="Enter name" value="{{ session()->get('register.company_name') }}">
                        <label for="name">position: </label>
                        <input type="text" name="position" class="form-control mb-2" placeholder="Enter name" value="{{ session()->get('register.position') }}">
                        <label for="name">mobile number: </label>
                        <input type="text" name="mobile_number" class="form-control mb-2" placeholder="Enter name" value="{{ session()->get('register.mobile_number') }}">
                        <label for="name">email: </label>
                        <input type="text" name="email" class="form-control mb-2" placeholder="Enter name" value="{{ session()->get('register.email') }}">
                        <label for="name">hear about us: </label>
                        <input type="text" name="hear_about_us" class="form-control mb-2" placeholder="Enter name" value="{{ session()->get('register.hear_about_us') }}">
                        <label for="name">privacy policy: </label>
                        <input type="text" name="privacy_policy" class="form-control mb-2" placeholder="Enter description" value="{{ session()->get('register.privacy_policy') }}">

                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
