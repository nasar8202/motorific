
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
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Your details</strong></li>
                                    <li id="personal"><strong>Dealership details</strong></li>
                                    <li id="payment"><strong>Purchasing requirements</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Your details</h2>
                                        <div class="form-group">
                                            <label>Full name *</label>
                                            <input type="text" name="fullname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Company Name *</label>
                                            <input type="text" name="companyname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Position *</label>
                                            <select name="position">
                                                <option selected="" value="">Select position</option>
                                                <option value="Buyer">Buyer</option>
                                                <option value="CEO / Managing Director">CEO / Managing Director</option>
                                                <option value="Director">Director</option>
                                                <option value="Group Buyer">Group Buyer</option>
                                                <option value="Group Sales Manager">Group Sales Manager</option>
                                                <option value="Owner / Proprietor">Owner / Proprietor</option>
                                                <option value="Sales Manager">Sales Manager</option>
                                                <option value="Stock Controller">Stock Controller</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile number *</label>
                                            <input type="number" name="mobileNumber" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address *</label>
                                            <input type="text" name="emailAddress" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="howDidYouHearAboutUs">
                                                <option selected="" value="">Select how you heard about us</option><option value="Search engine">Search engine</option><option value="TV">TV</option><option value="Radio">Radio</option><option value="Printed advert">Printed advert</option><option value="Event">Event</option><option value="Word of mouth">Word of mouth</option><option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group radio-group">
                                            <label for="policy">
                                                <input type="radio" name="policy" id="policy">
                                                <span>I have read the <a href="/privacy" rel="noopener noreferrer" target="_blank">Privacy Policy</a> and accept the <a class="SignupPage_termsLink__GuXm5" href="/terms" rel="noopener noreferrer" target="_blank">Terms &amp; Conditions</a>.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Dealership details</h2>
                                        <div class="form-group">
                                            <label>Address line 1 *</label>
                                            <input type="text" name="addressline1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address line 2 *</label>
                                            <input type="text" name="addressline2" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Town / city *</label>
                                            <input type="text" name="townCity" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Postcode *</label>
                                            <input type="text" name="postcode" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Company type *</label>
                                            <select name="companyType">
                                                <option value="">Select company type</option><option value="Broker">Broker</option><option value="Car supermarket">Car supermarket</option><option value="Independent">Independent</option><option value="Leasing company">Leasing company</option><option value="Main dealer multi-franchise">Main dealer (multi-franchise)</option><option value="Main dealer single-franchise">Main dealer (single-franchise)</option><option value="Manufacturer">Manufacturer</option><option value="Online car buyer">Online car buyer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Website *</label>
                                            <input type="text" name="website" placeholder="e.g. www.motorway.co.uk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Company phone *</label>
                                            <input type="number" name="companyPhone" required>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                    <input type="button" name="next" class="next action-button" value="Next Step"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Purchasing requirements</h2>
                                        <div class="form-group radio-group">
                                            <label>Which makes do you purchase? *</label>
                                            <div class="insideRadio makesradio">
                                                <label for="allMakes">
                                                    <input type="radio" name="makes" id="allMakes">
                                                    <span>All makes</span>
                                                </label>
                                                <label for="specificMakes">
                                                    <input type="radio" name="makes" id="specificMakes">
                                                    <span>Specific makes</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select name="companyType" class="js-select2 companyType"  multiple="multiple">
                                                <option value="">Select Makes</option>
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-group twoInOneLine">
                                            <label>What is the value of vehicles you typically purchase? *</label>
                                            <div class="absolutelabel">
                                                <label>€</label>
                                                <input id="priceFrom" class="mw-input" placeholder="4,000" required="" pattern="[0-9]*" data-private="true" type="text" value="">
                                            </div>
                                            <span>-</span>
                                            <div class="absolutelabel">
                                                <label>€</label>
                                                <input id="priceTo" class="mw-input" placeholder="10,000" required="" pattern="[0-9]*" data-private="true" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="form-group twoInOneLine">
                                            <label>What is the age of vehicles you typically purchase? *</label>
                                            <div class="absolutelabel">
                                                <label>From</label>
                                                <input id="ageFrom" class="mw-input" placeholder="1" required="" pattern="[0-9]*" data-private="true" type="text" value="">
                                            </div>
                                            <span>-</span>
                                            <div class="absolutelabel">
                                                <label>To</label>
                                                <input id="ageTo" class="mw-input" placeholder="5" required="" pattern="[0-9]*" data-private="true" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="form-group twoInOneLine">
                                            <label>What is the mileage of vehicles you typically purchase? *</label>
                                            <div class="absolutelabel">
                                                <label>From</label>
                                                <input id="mileageFrom" class="mw-input" placeholder="12,000" required="" pattern="[0-9]*" data-private="true" type="text" value="">
                                            </div>
                                            <span>-</span>
                                            <div class="absolutelabel">
                                                <label>To</label>
                                                <input id="mileageTo" class="mw-input" placeholder="20,000" required="" pattern="[0-9]*" data-private="true" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>How far will you travel to collect vehicles? *</label>
                                            <select name="maximumCollectionDistance">
                                                <option value="">Select distance</option><option value="0">0 miles (drop-off only)</option><option value="10">Up to 10 miles</option><option value="20">Up to 20 miles</option><option value="30">Up to 30 miles</option><option value="50">Up to 50 miles</option><option value="75">Up to 75 miles</option><option value="100">Up to 100 miles</option><option value="200">Up to 200 miles</option><option value="500">Up to 500 miles</option><option value="Nationwide">Nationwide</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>How many vehicles do you purchase each month? *</label>
                                            <select name="carsPerMonth">
                                                <option value="">Select number of vehicles</option><option value="0to10">0 - 10</option><option value="10to25">10 - 25</option><option value="25to50">25 - 50</option><option value="50to100">50 - 100</option><option value="100to250">100 - 250</option><option value="250to500">250 - 500</option><option value="500+">500+</option>
                                            </select>
                                        </div>
                                        <div class="form-group textarea">
                                            <label>Anything else we should know?</label>
                                            <textarea name="anythingElse"></textarea>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                    <input type="submit" name="make_payment" class="next action-button" value="Sign Up"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


