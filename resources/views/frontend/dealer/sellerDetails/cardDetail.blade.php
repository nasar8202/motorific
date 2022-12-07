@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


.container-full{
background: linear-gradient(to right, #c7c3c3 52%,#202543 53%,#202543 100%);
font-family: 'Roboto', sans-serif;
}

.card{
	border: none;
	max-width: 450px;
	border-radius: 15px;
	margin: 150px 0 150px;
	padding: 35px;
	padding-bottom: 20px!important;
}
.heading{
	color: #C1C1C1;
	font-size: 14px;
	font-weight: 500;
}
img{
	transform: translate(160px,-10px);
}
img:hover{
    cursor: pointer;
}
.text-warning{
	font-size: 12px;
	font-weight: 500;
	color: #edb537!important;
}
#cno{
	transform: translateY(-10px);
}
input{
	border-bottom: 1.5px solid #E8E5D2!important;
	font-weight: bold;
	border-radius: 0;
	border: 0;

}
.form-group input:focus{
	border: 0;
	outline: 0;
}
.col-sm-5{
	padding-left: 90px;
}
.btn{
	background: #F3A002!important;
	border: none;
	border-radius: 30px;
}
.btn:focus{
    box-shadow: none;
}
</style>
<div class="topPadingPage">
    <center><b>Motorific</b> 
    <p>You Need To Pay 80$ Charge To Buy From This Platform</p>
</center>
    <div class="container-full">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card mx-auto">
                        <p class="heading">PAYMENT DETAILS</p>
                            <form class="card-details " action="{{route('cardDetailsCreate')}}" method="POST">
                                @csrf
                                <div class="form-group mb-0">
                                        <p class="text-warning mb-0">Card Number</p> 
                                          <input type="text" name="card_num" placeholder="1234 5678 9012 3457" size="16" id="cno" minlength="16" maxlength="16">
                                        <img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px" />
                                        <br>
                                        @if ($errors->has('card_num'))
                                        <span class="text-danger">{{ $errors->first('card_num') }}</span>
                                    @endif
                                    </div>
        
                                <div class="form-group">
                                    <p class="text-warning mb-0">Cardholder's Name</p> <input type="text" name="name" placeholder="Name" size="17">
                                    <br>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                </div>
                                <div class="form-group pt-2">
                                    <div class="row d-flex">
                                        <div class="col-sm-4">
                                            <p class="text-warning mb-0">Expiration</p>
                                            <input type="text" name="exp" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7">
                                            <br>
                                            @if ($errors->has('exp'))
                                        <span class="text-danger">{{ $errors->first('exp') }}</span>
                                    @endif
                                        </div>
                                        <div class="col-sm-3">
                                        </div>
                                        <div class="col-sm-5 pt-0">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right px-3 py-2"></i></button>
                                        </div>
                                    </div>
                                </div>		
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection


