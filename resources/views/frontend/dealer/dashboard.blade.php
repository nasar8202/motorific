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
                    <h2><strong>Welcome!  {{ Auth::user()->name }}</strong></h2>
                    <p>Dealer Dashboard</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


