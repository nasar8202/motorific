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
                <h2><strong>Sign Up Your User Account</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">


                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Your details</strong></li>
                                <li id="personal"><strong>Dealership details</strong></li>
                                <li id="payment"><strong>Purchasing requirements</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <form id="msform" action="{{ route('register.post.step.3') }}" method="POST">
                                @csrf
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Purchasing requirements</h2>
                                    <div class="form-group radio-group">
                                        <label>Which makes do you purchase? *</label>
                                        <div class="insideRadio makesradio">
                                            <label for="allMakes">
                                                <input type="radio" name="all_makes"   value="all_makes" id="allMakes">
                                                <span>All makes</span>
                                            </label>
                                            <label for="specificMakes">
                                                <input type="radio" name="all_makes"   value="specific makes" id="specificMakes">
                                                <span>Specific makes</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="specific_makes" class="js-select2 companyType"  multiple="multiple">
                                            <option value="">Select Makes</option>
                                            <option @if(session()->get('specific_makes') != null) {{ session()->get('specific_makes') == "1" ? 'selected' :  '' }}  value="1" @endif>1</option>
                                            <option @if(session()->get('specific_makes') != null) {{ session()->get('specific_makes') == "2" ? 'selected' :  '' }}  value="2" @endif>2</option>
                                        </select>
                                    </div>
                                    <div class="form-group twoInOneLine">
                                        <label>What is the value of vehicles you typically purchase? *</label>
                                        <div class="absolutelabel">
                                            <label>€</label>
                                            <input id="priceFrom" class="mw-input" placeholder="4,000" required="" pattern="[0-9]*" data-private="true" type="text" name="lowest_purchase_price"  value="{{ session()->get('lowest_purchase_price') }}">
                                        </div>
                                        <span>-</span>
                                        <div class="absolutelabel">
                                            <label>€</label>
                                            <input id="priceTo" class="mw-input" placeholder="10,000" required="" pattern="[0-9]*" data-private="true" type="text" name="highest_purchase_price"   value="{{ session()->get('highest_purchase_price') }}">
                                        </div>
                                    </div>
                                    <div class="form-group twoInOneLine">
                                        <label>What is the age of vehicles you typically purchase? *</label>
                                        <div class="absolutelabel">
                                            <label>From</label>
                                            <input id="ageFrom" class="mw-input" placeholder="1" required="" pattern="[0-9]*" data-private="true" type="text" name="age_range_from"  value="{{ session()->get('age_range_from') }}">
                                        </div>
                                        <span>-</span>
                                        <div class="absolutelabel">
                                            <label>To</label>
                                            <input id="ageTo" class="mw-input" placeholder="5" required="" pattern="[0-9]*" data-private="true" type="text" name="age_range_to"  value="{{ session()->get('age_range_to') }}">
                                        </div>
                                    </div>
                                    <div class="form-group twoInOneLine">
                                        <label>What is the mileage of vehicles you typically purchase? *</label>
                                        <div class="absolutelabel">
                                            <label>From</label>
                                            <input id="mileageFrom" class="mw-input" placeholder="12,000" required="" pattern="[0-9]*" data-private="true" type="text"  name="mileage_from"  value="{{ session()->get('mileage_from') }}">
                                        </div>
                                        <span>-</span>
                                        <div class="absolutelabel">
                                            <label>To</label>
                                            <input id="mileageTo" class="mw-input" placeholder="20,000" required="" pattern="[0-9]*" data-private="true" type="text" name="mileage_to"  value="{{ session()->get('mileage_to') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>How far will you travel to collect vehicles? *</label>
                                        <select name="how_far_distance" >
                                            <option value="">Select distance</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "0" ? 'selected' :  '' }}  value="0" @endif>0 miles (drop-off only)</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "10" ? 'selected' :  '' }}  value="10" @endif>Up to 10 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "20" ? 'selected' :  '' }}  value="20" @endif>Up to 20 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "30" ? 'selected' :  '' }}  value="30" @endif>Up to 30 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "50" ? 'selected' :  '' }}  value="50" @endif>Up to 50 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "75" ? 'selected' :  '' }}  value="75" @endif>Up to 75 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "100" ? 'selected' :  '' }}  value="100" @endif>Up to 100 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "200" ? 'selected' :  '' }}  value="200" @endif>Up to 200 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "500" ? 'selected' :  '' }}  value="500" @endif>Up to 500 miles</option>
                                            <option @if(session()->get('how_far_distance') != null) {{ session()->get('how_far_distance') == "Nationwide" ? 'selected' :  '' }}  value="Nationwide" @endif>Nationwide</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>How many vehicles do you purchase each month? *</label>
                                        <select name="purchase_each_month_vehicles" >
                                            <option value="">Select number of vehicles</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "0to10" ? 'selected' :  '' }}  value="0to10" @endif >0 - 10</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "10to25" ? 'selected' :  '' }}  value="10to25" @endif >10 - 25</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "25to50" ? 'selected' :  '' }}  value="25to50" @endif >25 - 50</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "50to100" ? 'selected' :  '' }}  value="50to100" @endif >50 - 100</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "100to250" ? 'selected' :  '' }}  value="100to250" @endif >100 - 250</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "250to500" ? 'selected' :  '' }}  value="250to500" @endif >250 - 500</option>
                                            <option @if(session()->get('purchase_each_month_vehicles') != null) {{ session()->get('purchase_each_month_vehicles') == "500+" ? 'selected' :  '' }}  value="500+" @endif >500+</option>
                                        </select>
                                    </div>
                                    <div class="form-group textarea">
                                        <label>Anything else we should know?</label>
                                        <textarea name="any_thing_else"  value="{{ session()->get('any_thing_else') }}"></textarea>
                                    </div>
                                </div>
                                {{-- <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="submit" name="make_payment" class="next action-button" value="Sign Up"/> --}}
                                {{-- <a type="button" href="{{ route('signup') }}" class="btn btn-warning">Back to Step 1</a>
                                <button type="submit" name="make_payment" class="next action-button">Sign Up</button> --}}
                                <a type="button" href="{{ route('signup') }}" class="btn btn-warning">Back to Step 1</a>
                                <button type="submit" class="btn btn-primary">Continue</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


