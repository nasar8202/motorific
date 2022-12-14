@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>
    .sec-2-txt h2 div,.sec-2-txt h2 div span {
        font-size: inherit;
        display: initial;
        color: inherit;
    }
</style>

<!-- MultiStep Form -->

<section class="sec-2 productPageTn">
<div class="container">
  <h2>Pricing 2022</h2>
  <p>Fees are based on the value of the winning bid in accordance with the table below. Regardless of whether the final purchase price is higher or lower than the winning bid, the fee shall always be based on the winning bid. Motorway shall invoice the Car Buying Partner within 3 working days of the Seller confirming the sale of their vehicle.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Price from</th>
        <th>Price to</th>
        <th>Fee (+VAT)</th>
      </tr>
    </thead>
    <tbody>
    @forelse($charges as $charge)
    <tr><td>£{{$charge->price_from}}</td><td>£{{$charge->price_to}}</td><td>£{{$charge->fee}}</td></tr>
    @empty
    @endforelse
    </tbody>
  </table>
</div>
</section>

@endsection
@push('child-scripts')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


@endpush

