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
                                                                <option value="0" disabled>Select Users</option>
                                                                    @forelse($sellers as $user)
                                                                    <option value="{{$user->id}}">{{$user->email}}</option>
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
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Title
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="enter title here" id="floatingTextarea" name="title"></textarea>
                                                            <label for="floatingTextarea">title</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Message for Subscribers</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <textarea name="description" id="default" cols="30" rows="10" placeholder="enter the message here"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

@endsection