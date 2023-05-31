@extends('backend.admin.layouts.app')
@section('title','add wheel nut ')
@section('secton')
<style>
    .container {
        max-width: 1200px;
    }
</style>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <a href="{{ route('valuationNotifications') }}"><span class="badge badge-success">Go Back</span></a>
                <h3>Send Valuation Notification to User</h3>
                <p class="text-subtitle text-muted">Send Valuation Notification to User</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notification</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-sm-0">
                        <h4 class="card-title">Send Valuation Notification to User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <form action="{{ route('sendValuationsNotificationsToSellers') }}" method="POST" class="oveflow-x-scroll p-0">
                                        @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="col-md-12 mb-4">
                                                        <h6>Select User To Send Valuation Notification</h6>

                                                        <div class="form-group">
                                                            <select name="users_id" id='sel_users' class="select2-multiple form-select ">
                                                                <option value="0" >Select Users</option>
                                                                    @forelse($sellers as $user)
                                                                    <option value="{{$user->id}}">{{$user->email." "."($user->name)"}}</option>
                                                                    @empty
                                                                    <option value="0" disabled>No Subscriber found!</option>
                                                                    @endforelse
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('users_id'))
                                                        <span class="text-danger">{{ $errors->first('users_id') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-content">
                                                <div class="card-body">
                                                <div id="vehicleDropdownContainer" class="form-group">
                                                    <select name="vehicles_id" id="sel_vehicles" class="select2-multiple form-select">
                                                    <option value="0" disabled>Select Vehicle</option>
                                                        <!-- The options will be dynamically generated -->
                                                    </select>
                                                </div>

                                                </div>
                                            </div>

                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Markup -->
<div class="modal fade" id="valuationModal" tabindex="-1" role="dialog" aria-labelledby="valuationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="valuationModalLabel">Vehicle Valuation</h5>
                
            </div>
            <div class="modal-body">
                <label for="valuationInput">Enter Vehicle Valuation:</label>
                <input type="number" id="valuationInput" class="form-control" placeholder="Enter valuation amount">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closeValuationBtn" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveValuationBtn">Save Valuation</button>
            </div>
        </div>
    </div>
</div>

</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });
</script>
<script>
    // Close modal
  $('#closeValuationBtn').click(function() {
    $('#valuationModal').modal('hide');
  });
$(document).ready(function() {
    var getVehiclesUrl = "{{ route('getVehicles', ['userId' => ':userId']) }}";

    $('#sel_users').change(function() {
        var userId = $(this).val();

        if (userId) {
            var url = getVehiclesUrl.replace(':userId', userId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    
                    if (response) {
                        $('#sel_vehicles').empty().append('<option value="0" disabled selected>Please select a vehicle</option>');
                        $.each(response, function(key, value) {
                            $('#sel_vehicles').append('<option value="' + value.id + '">' + value.vehicle_name + ' ('+value.vehicle_registartion_number+') ' + '</option>');
                        });

                        // Show the valuation pop-up for the selected vehicle
                        $('#sel_vehicles').change(function() {
                            var vehicleId = $(this).val();

                            if (vehicleId) {
                                // Display the valuation modal popup
                                $('#valuationModal').modal('show');
                            }
                        });

                        // Save valuation button click event
                        $(document).on('click', '#saveValuationBtn', function() {
                            var valuationInput = $('#valuationInput').val();
                            var vehicleId = $('#sel_vehicles').val();
                            // Validate the valuation input
                            if (!valuationInput) {
                                toastr.error('Valuation price is required.');
                                return;
                            }
                            // Send the valuation data to the controller using AJAX
                            $.ajax({
                                url: "{{ route('saveValuation') }}",
                                type: 'POST',
                                data: {
                                    vehicle_id: vehicleId,
                                    userId:userId,
                                    valuation: valuationInput
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // console.log("Valuation saved successfully:", response);
                                    if (response.success) {
                                        toastr.success('Valuation saved successfully.');
                                        // Close the modal or perform any other necessary actions
                                        // Close the valuation modal popup
                                    $('#valuationModal').modal('hide');
                                    $('#valuationInput').val('');
                                   $('#sel_vehicles').empty().append('<option value="0" disabled selected>Please select a vehicle</option>');
                                    } else {
                                        toastr.error('Failed to save valuation.');
                                        // Close the valuation modal popup
                                    $('#valuationModal').modal('hide');
                                    $('#valuationInput').val('');
                                   $('#sel_vehicles').empty().append('<option value="0" disabled selected>Please select a vehicle</option>');
                                    }
                                    
                                },
                                error: function(xhr, status, error) {
                                    console.log("Error saving valuation:", error);
                                }
                            });
                        });
                    } else {
                        $('#sel_vehicles').empty().append('<option value="0" disabled selected>No Vehicles found</option>');
                    }
                }
            });
        } else {
            $('#sel_vehicles').empty().append('<option value="0" disabled selected>Please select a vehicle</option>');
        }
    });
});






</script>

@endsection