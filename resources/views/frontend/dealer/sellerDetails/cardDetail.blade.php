@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- form css -->
<div class="topPadingPage">
    <center><b>Motorific</b> 
    <p>You Need To Pay 80$ Charge To Buy From This Platform</p>
</center>
</div>
<div class="container">
      
    @php
    // $stripe_key = 'pk_test_51L6BbmHh7DA7fp0Jmuouwc2S6BYw0nxzU7DQ1ReEbtzSxgZ9noLLm2tQKpvTSHVsbkem8FzrNuFG54WThtLTwB8X00Es15AMHg';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
             
                <div class="card">
                    <form 
                    role="form" 
                    action="{{ route('stripePayment') }}" 
                    method="post" 
                    class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                    id="payment-form">
                @csrf
                <input type="hidden" name="vehicleId" value="{{$id}}">
                <input type="hidden" name="amount" value="{{$charges_payment}}">
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="role" value="{{$role}}">
                
                <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label> <input
                            class='form-control' name="name_on_card" size='4' type='text'>
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label> <input
                            autocomplete='off' name="card_number" class='form-control card-number' size='20'
                            type='text'>
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                            class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4'
                            type='text'>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label> <input
                            class='form-control card-expiry-month' name="expiration_month" placeholder='MM' size='2'
                            type='text'>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label> <input
                            class='form-control card-expiry-year' name="expiration_year" placeholder='YYYY' size='4'
                            type='text'>
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>Please correct the errors and try
                            again.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                    </div>
                </div>
                    
            </form>
              </div>
          </div>
      </div>
  </div>
    <br>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script src="https://js.stripe.com/v3/"></script> --}}
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
   $(function() {
  
  /*------------------------------------------
  --------------------------------------------
  Stripe Payment Code
  --------------------------------------------
  --------------------------------------------*/
  
  var $form = $(".require-validation");
   
  $('form.require-validation').bind('submit', function(e) {
      var $form = $(".require-validation"),
      inputSelector = ['input[type=email]', 'input[type=password]',
                       'input[type=text]', 'input[type=file]',
                       'textarea'].join(', '),
      $inputs = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid = true;
      $errorMessage.addClass('hide');
  
      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault();
        }
      });
   
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
  
  });
    
  /*------------------------------------------
  --------------------------------------------
  Stripe Response Handler
  --------------------------------------------
  --------------------------------------------*/
  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
               
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
   
});
</script>
@endsection


