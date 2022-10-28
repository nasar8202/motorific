@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Sign In Your User Account</strong></h2>

                <div class="row">
                    <div class="col-md-12 mx-0">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- @dd(session()->get('register')) --}}
                            <!-- progressbar -->
                            <ul id="progressbar">

                                <li id="personal"><strong></strong></li>
                                <li class="active" id="account"><strong>Login</strong></li>
                                <li id="payment"><strong></strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <form id="msform" action="{{ route('login') }}" method="POST">
                                @csrf
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Login </h2>

                                    <div class="form-group">
                                        <label>Email address *</label>
                                        <input type="email" name="email" value="{{ session()->get('email') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input type="password" name="password" value="{{ session()->get('password') }}" >
                                    </div>


                                </div>
                                {{-- <button type="submit"  class="next action-button">Next Step</button> --}}
                                <button type="submit" class="btn btn-primary">Login</button>
                            </fieldset>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


