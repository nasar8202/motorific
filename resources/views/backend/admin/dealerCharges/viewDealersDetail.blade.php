
@extends('backend.admin.layouts.app')
@section('title','view New Request Dealers List')
@section('secton')
<style>
    body {
  padding: 0;
  margin: 0;
  font-family: 'Lato', sans-serif;
  color: #000;
}

.student-profile .card {
  border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .card p {
  font-size: 16px;
  color: #000;
}

.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
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
                <h3>View {{$dealers->name}} Details</h3>
                <p class="text-subtitle text-muted">View {{$dealers->name}} Details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dealers Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Dealer Details
            </div>
            <div class="card-body">
           <!-- Student Profile -->
<div class="student-profile py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="{{URL::asset('backend\admin\assets\images\dealerprofile\man.png')}}" alt="">
              <h3>{{$dealers->name}}</h3>
            </div>
            <div class="card-body">
              <p class="mb-0"><strong class="pr-1">Email :</strong>{{$dealers->email}}</p>
              <p class="mb-0"><strong class="pr-1">Phone Number :</strong>{{$dealers->phone_number}}</p>
            </div>
          </div>

        </div>

        <div class="col-lg-8">
          <form action="{{ route('dealer.approveRequestDocuments') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $dealers->id }}">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                </div>
                <div class="card-body pt-0">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">Address</th>
                      <td width="2%">:</td>
                      <td>{{$dealers->userDetails->address_line_1}}</td>
                    </tr>
                    <tr>
                      <th width="30%">City	</th>
                      <td width="2%">:</td>
                      <td>{{$dealers->userDetails->city}}</td>
                    </tr>
                    <tr>
                      <th width="30%">Postcode</th>
                      <td width="2%">:</td>
                      <td>{{$dealers->userDetails->postcode}}</td>
                    </tr>
                    <tr>
                      <th width="30%">Website</th>
                      <td width="2%">:</td>
                      <td>{{$dealers->userDetails->website}}</td>
                    </tr>
                    <tr>
                      <th width="30%">Company Phone</th>
                      <td width="2%">:</td>
                      <td>{{$dealers->userDetails->company_phone}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Lower Purchase Price</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->lowest_purchase_price}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Highest Purchase Price </th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->highest_purchase_price}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Age Range To</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->age_range_to}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Age Range From</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->age_range_from}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Mileage From</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->mileage_from}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Milage To</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->mileage_to}}</td>
                      </tr>
                      <tr>
                        <th width="30%">How Far Distance</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->how_far_distance}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Purchase Rach Month Vehicles</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->purchase_each_month_vehicles}}</td>
                      </tr>
                      <tr>
                        <th width="30%">Any Thing Else</th>
                        <td width="2%">:</td>
                        <td>{{$dealers->userDetails->any_thing_else}}</td>
                      </tr>


                  </table>
                </div>
              </div>

          </form>

        </div>

      </div>

    </div>
  </div>


            </div>
        </div>

    </section>
</div>
@endsection