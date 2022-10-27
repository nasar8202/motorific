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

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Your details</strong></li>
                                <li id="personal"><strong>Dealership details</strong></li>
                                <li id="payment"><strong>Purchasing requirements</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <form id="msform" action="{{ route('register.post.step.2') }}" method="POST">
                                @csrf
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Dealership details</h2>
                                    <div class="form-group">
                                        <label>Address line 1 *</label>
                                        <input type="text" name="address_line_1"  placeholder="Enter description" value="{{ session()->get('address_line_1') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address line 2 *</label>
                                        <input type="text" name="address_line_2"  placeholder="Enter description" value="{{ session()->get('address_line_2') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Town / city *</label>
                                        <input type="text" name="city"  placeholder="Enter description" value="{{ session()->get('city') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode *</label>
                                        <input type="text" name="postcode"  placeholder="Enter description" value="{{ session()->get('postcode') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Company type *</label>
                                        <select name="company_type"  placeholder="Enter description" value="{{ session()->get('company_type') }}">
                                            <option value="">Select company type</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Broker" ? 'selected' :  '' }}  value="Broker" @endif>Broker</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Car supermarket" ? 'selected' :  '' }}  value="Car supermarket" @endif>Car supermarket</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Independent" ? 'selected' :  '' }}  value="Independent" @endif>Independent</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Leasing company" ? 'selected' :  '' }}  value="Leasing company" @endif>Leasing company</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Main dealer (multi-franchise)" ? 'selected' :  '' }}  value="Main dealer (multi-franchise)" @endif>Main dealer (multi-franchise)</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Main dealer (single-franchise)" ? 'selected' :  '' }}  value="Main dealer (single-franchise)" @endif>Main dealer (single-franchise)</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Manufacturer" ? 'selected' :  '' }}  value="Manufacturer" @endif>Manufacturer</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Online car buyer" ? 'selected' :  '' }}  value="Online car buyer" @endif>Online car buyer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Website *</label>
                                        <input type="text" name="website" value="{{ session()->get('website') }}" placeholder="e.g. www.motorofic.co.uk" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Company phone *</label>
                                        <input type="number" name="company_phone"  placeholder="Enter Phone Number" value="{{ session()->get('company_phone') }}" required>
                                    </div>
                                </div>
                                {{-- <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/> --}}
                                {{-- <button type="submit" name="next" class="next action-button">Next Step</button>
                                <button type="submit"  href="{{ route('signup') }}" name="previous" class="previous action-button-previous">Previous</button> --}}
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


