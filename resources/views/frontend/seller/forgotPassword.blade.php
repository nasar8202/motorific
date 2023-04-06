@extends('frontend.seller.layouts.app')
@section('title','Sell Login')
@section('section')
@section('headerClass','transparent-header')
@section('headerUlClass','navlinks-w')
@section('logoMain','frontend/seller/assets/image/logo-w.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')
<style>
    .dropdown > span{
        position: relative;
        display: inline-block;
        color:white;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
      <!-- PHOTO-UPLOAD-SECTION-1 -->
      <section class="photo-up-sec-1 reg-page-sec1">
        <div class="container-1151">
            <div class="d-flex">
                {{-- <div class="my-auto">
                <img src="{{ URL::asset('frontend/seller/assets/image/bmw.png')}}" alt="">
                </div>
                <div class="">
                <h3>GJ65 YUA</h3>
                <p class="p-0">Volkswagen Golf R DSG</p>
                </div> --}}
            </div>
        </div>
    </section>
    
<!--Forgott Password Section-->

<!--<section class="userform-sec forgott">-->
<!--    <div class="container-1151">-->
<!--        <div class="form-box">-->
<!--            <h2>Enter Your Email To Get Your Password</h2>-->
<!--            <form method="POST" action="{{ route('forgotPass') }}">-->
<!--            @csrf-->
<!--                <div class="form-group">-->
<!--                    <label>Email Address</label>-->
<!--                    <input type="email" placeholder="" name="email" class="@error('email') is-invalid @enderror form-control" name="email" value="{{ old('email') }}">-->
<!--                    @error('email')-->
<!--                        <span class="invalid-feedback" role="alert">-->
<!--                            <strong>{{ $message }}</strong>-->
<!--                        </span>-->
<!--                    @enderror-->
<!--                </div>-->
<!--                <div class="form-group form-btn">-->
<!--                    <button>Reset Password</button>-->
<!--                    <a href="{{route('myLogin')}}" class="fw-bold">Login</a>-->
<!--                </div>-->
<!--            </form>-->
            
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--Forgott Password Section End-->

    <!-- REGISTRATION-FORM -->
    <div class="registration-form forgott-form">
        <div class="reg-form-heading">
            <h3>Enter Your Email To Get Your Password</h3>
            {{-- <p>It will take 60 seconds</p> --}}
        </div>

        <div class="container-700">
            <div class="form-main text-center">
                <form method="POST" action="{{ route('forgotPass') }}">
                    @csrf
                    <div class="inputBox">

                        <input type="email" placeholder="E-mail Address" name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div>
                        <button type="submit " class="m-0"> Send Password Reset Link</button>
                    </div>
                </form>
                <a href="{{route('myLogin')}}" class="login-link">Login</a>
            </div>
        </div>
    </div>


@endsection
@push('child-scripts')
<script  type="text/javascript">
    $(document).ready(function() {
        
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
        });
    });
    </script>
@endpush