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
    <tbody><tr><td>£0</td><td>£4,999</td><td>£225</td></tr><tr><td>£5,000</td><td>£9,999</td><td>£245</td></tr><tr><td>£10,000</td><td>£14,999</td><td>£295</td></tr><tr><td>£15,000</td><td>£19,999</td><td>£345</td></tr><tr><td>£20,000</td><td>£29,999</td><td>£395</td></tr><tr><td>£30,000</td><td>£39,999</td><td>£445</td></tr><tr><td>£40,000</td><td>£49,999</td><td>£495</td></tr><tr><td>£50,000</td><td>£99,999</td><td>£745</td></tr><tr><td>£100,000+</td><td></td><td>£995</td></tr></tbody>
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

