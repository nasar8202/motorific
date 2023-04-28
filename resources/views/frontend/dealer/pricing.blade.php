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

<section class="sec-2 productPageTn hm-hiw-sec">
<div class="container">
  <h2>Motorific buyers fee <?php echo date("Y"); ?></h2>
  <p>The following table outlines the fees based on the winning bid's value. The charge shall always be based on the winning bid, whether the actual purchase price is more or lower than the winning bid. If the Seller confirms the sale of the vehicle, Motorific must charge and invoice the buyers fee before revealing the sellers contact information.</p>            
  <div class="hm-pricing-table">
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
  <div>
</div>
</section>

@endsection
@push('child-scripts')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


@endpush

