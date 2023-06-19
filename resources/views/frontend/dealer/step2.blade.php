@extends('frontend.dealer.layouts.app')
@section('title','Purchase your dealership Stock With motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->
<div class="container-fluid logins-container" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-10 col-lg-6 text-center p-0 mt-3 mb-2">
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
                                {{-- <li id="payment"><strong>Purchasing requirements</strong></li> --}}
                            </ul>
                            <!-- fieldsets -->
                            <form id="msform" class="dealerlogins" action="{{ route('register.post.step.2') }}" method="POST" >
                                @csrf
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Dealership details</h2>
                                    <div class="form-group">
                                        <label>Postcode *</label>
                                        <input type="text" name="postcode"  placeholder="Enter Post Code" id="search" value="{{ session()->get('postcode')?? old('postcode') }}" required>
                                        <ul class="list-group text-center fw-bolder suggestionSearch" id="result"></ul> 
                                    </div>
                                    <div class="form-group">
                                        <label>Address line 1 *</label>
                                        <input type="text" name="address_line_1" id="searchAddress" placeholder="Enter Address Line 1" value="{{ session()->get('address_line_1') ?? old('address_line_1') }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Premises name / Number *</label>
                                        <input type="text" name="address_line_2"  placeholder="Premises name / Number 2" value="{{ session()->get('address_line_2')?? old('address_line_2') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Town / city *</label>
                                        <input type="text" name="city"  placeholder="Enter City" value="{{ session()->get('city') ?? old('city')}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Company type *</label>
                                        <select name="company_type"  placeholder="Enter description" value="{{ session()->get('company_type') ?? old('company_type') }}">
                                            <option value="">Select company type</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Car supermarket" ? 'selected' :  '' }}  value="Car supermarket" @endif>Car supermarket</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Independent" ? 'selected' :  '' }}  value="Independent" @endif>Independent</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Main dealer (multi-franchise)" ? 'selected' :  '' }}  value="Main dealer (multi-franchise)" @endif>Main dealer (multi-franchise)</option>
                                            <option @if(session()->get('company_type') != null) {{ session()->get('company_type') == "Main dealer (single-franchise)" ? 'selected' :  '' }}  value="Main dealer (single-franchise)" @endif>Main dealer (single-franchise)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Website </label>
                                        <input type="text" name="website" value="{{ session()->get('website') ?? old('website') }}" placeholder="e.g. www.motorofic.co.uk" >
                                    </div>
                                    <div class="form-group">
                                        <label>Company phone (11 digits)*</label>
                                        <input type="number" name="company_phone"  placeholder="Enter Phone Number" value="{{ session()->get('company_phone') ?? old('company_phone') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload ID Card (Passport, driving license)</label>
                                        <input type="file" name="dealer_identity_card"  id="dealer_identity_card">
                                        <input type="hidden" name="dealer_identity_card" id="hiddenIdentityCardField" value="">
                                        <span id="dealer_identity_card_error"></span>

                                            
                                    </div>
                                    <div>
                                        <label for="documents">Upload Documents
                                        (motor trade insurance)
                                        </label>
                                        
                                        <input type="file" name="dealer_documents" id="dealer_documents">
                                        <input type="hidden" name="dealer_documents" id="hiddenDealerDocumentsField" value="">
                                        <span id="dealer_documents_error"></span>
                                    </div>
                                    <div class="red-notice" style="color:red;">Note (No ID? You can submit at a later date, to continue simply clicking on the Submit tab)</div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('child-scripts')
<script  type="text/javascript">
$('#dealer_identity_card').change(function() {
    validateImageFile(this); // Call the image file validation function
    startUpload();
});

function validateImageFile(input) {
    var file = input.files[0];
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(input.value)) {
        alert('Please select a valid image file (JPG, JPEG, or PNG).');
        $('#dealer_identity_card').val(''); // Clear the file input field
        $('#hiddenIdentityCardField').val('');
        return false;
    }

    return true;
}

function startUpload() {
    var formData = new FormData();
    var imageFile = $('#dealer_identity_card')[0].files[0];
    formData.append('dealer_identity_card', imageFile);

    $.ajax({
        url: 'uploadDocumentsImage',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(data, status) {
            if (typeof data.errors !== 'undefined') {
                var errors = data.errors;
                if (errors.dealer_identity_card) {
                    $('#dealer_identity_card_error').text(errors.dealer_identity_card[0]);
                }
            } else if (typeof data.path !== 'undefined') {
                $('#hiddenIdentityCardField').val(data.path);
                console.log('Image uploaded: ' + data.path);
            }
        },
        error: function(xhr, status, error) {
            console.log("XHR status:", status);
            console.log("XHR error:", error);
        }
    });
    return false;
}


$('#dealer_documents').change(function() {
    validateImageType(this); // Call the image type validation function
    startUpload_2();
});

function validateImageType(input) {
    
    var file = input.files[0];
    var imageType = /^image\//;

    if (!imageType.test(file.type)) {
        alert('Please select an image file.');
        $('#dealer_documents').val(''); // Clear the file input field
        return false;
    }

    return true;
}

function startUpload_2() {
    var formData = new FormData();
    var imageFile = $('#dealer_documents')[0].files[0];
    formData.append('dealer_documents', imageFile);

    $.ajax({
        url: 'uploadDocumentsImage',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(data, status) {
            if (typeof data.path !== 'undefined') {
                $('#hiddenDealerDocumentsField').val(data.path);
                console.log('Image uploaded: ' + data.path);
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    return false;
}


    $(document).ready(function() {
        
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
            $('.btn-primary').html('Please Wait Submitting...');
        });
    });
    </script>
<script type="text/javascript">
     $("#search").keyup( function() {

        $("#result").html('');
        
        let zip = $("#search").val();
       let removspace =  zip.replace(/\s/g, '');
       console.log(removspace)
            let api = `https://maps.googleapis.com/maps/api/geocode/json?address=.'${removspace}'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk`;
       
        $.getJSON( api, function( results ) {
            console.log(results,results.status,"cheking");
            if(results?.results && results?.results.length !== 0){
            $.each( results.results, function( key, value ) {
                if( value.formatted_address ) 
                {
                    $("#result").html(`<li class="list-group-item c">${value.formatted_address} </li>`)
                }
            } );
        } else {
            $("#result").html(`<span class="list-group-item c">Not Found</span>`)
        }
        } );
    } );

    $("#result").on("click", "li", function() {
        $("#searchAddress").val($(this).text());
        $("#result").html('');
    })
</script>
@endpush

