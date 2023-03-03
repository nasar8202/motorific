@extends('frontend.dealer.layouts.app')
@section('title','Purchases')
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
    <div class="row">
        <div class="col-lg-3 col-md-3 productsFiltersCol">
            <div class="productsFilters">
                @include('frontend.dealer.include.biddsOffer')
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
<h5>Biddes On My Vehicle</h5>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vehilce Name</th>
                            <th scope="col">Vehicle Price</th>
                            <th scope="col">Biddes User</th>
                            <th scope="col">Biddes Price</th>
                            <th scope="col">Biddes Assign To</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $key=>$order)
                            <tr>
                        
                            <td>{{$key + 1}}</td>
                            <td>{{$order->vehicle->vehicle_name}}</td>
                            <td>{{$order->vehicle->vehicle_price}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->request_price}}</td>
                            @if($order->status == 1)
                            <td><span class="btn btn-warning">Solded User</span>
                                <button type="button" class="btn btn-outline-primary block " data-bs-toggle="modal"
                                data-bs-target="#default">
                                View Meeting
                            </button>
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Your Meeting Schedule</h5>
                                        <button type="button" class="close rounded-pill"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <span>Your Meeting Date And Time </span>
                                    
                                      <b>@if($order->meeting_date_time == null)
                                       No Meeting Has Been Schedule Yet
                                       @else
                                       {{$order->meeting_date_time}}
                                   @endif
                                   </b>
                                      <br>
                                      <form class="mt-4" method="POST" action="{{route('dealerMeetingStatus')}}">
                                       @csrf
                                       <span>Tell Us Your Meeting Status ?</span>
                                       <input type="hidden"  name="id" value="{{$order->id}}">
                                       <select class="form-control " name="status" required>
                                           <option disabled selected>Select Status</option>
                                           <option value="Pending">Pending</option>
                                           <option value="Completed">Completed</option>
                                           <option value="No Response From Dealer">No Response From Dealer</option>
                                       </select>
                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="disable" class="btn btn-primary ml-1 {{$order->meeting_date_time ?? 'disabled'}}">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Update</span>
                                        </button>
                                       </form>
                                    </div>
                                </div>
                            </div>
                           </div></td>
                                @else
                           <td>
                                <span class="btn btn-info">Not Sold User</span>
                             </td>
                             @endif
                            @empty
                            <td colspan="6" class="text-center">No Biddes Found On This Vehicle</td>
                          
                        </tr>
                        @endforelse 
                        </tbody>
                      </table>
                    <br>
                   
                </div>
                <!-- BOX-1 -->

            </div>

        </div>
    </div>
</div>
</section>

@endsection
@push('child-scripts')


@endpush

