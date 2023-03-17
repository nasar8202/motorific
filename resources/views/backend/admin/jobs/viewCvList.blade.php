
@extends('backend.admin.layouts.app')
@section('title','view Seat Material List')
@section('secton')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                {{-- <a href="{{ route('createNotificationToSubscriberForm') }}"><span class="badge badge-success">Go Back</span></a> --}}
                <h3>Jobs</h3>
                <p class="text-subtitle text-muted">View All Jobs List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Applied Job Title</th>
                            <th>Cv</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($CvLists as $key=> $CvList)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$CvList->first_name}}</td>
                            <td>{{$CvList->last_name}}</td>
                            <td>{{$CvList->email}}</td>
                            <td>{{$CvList->phone_number}}</td>
                            <td>{{$CvList->applied_for}}</td>
                            <td><a href="{{ asset('/jobs/data/'.$CvList->cv) }}" download>Download</a> </td>
                            
                        </form>
                        </tr>
                        @empty
                        @endforelse
                    
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@endsection
