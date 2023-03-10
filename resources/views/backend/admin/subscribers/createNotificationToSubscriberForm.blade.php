
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
                <h3>Send Notification to all Subscribers</h3>
                <p class="text-subtitle text-muted">Send Notification to all Subscribers</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vehicle</li>
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
                    <h4 class="card-title">Send Notification to all Subscribers</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="container-fluid">

                            <div class="row">

                                <form action="{{ route('sendNotificationsToUsers') }}" method="POST" class="oveflow-x-scroll p-0">
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
                                                        <h6>Select Users To Send Notification</h6>
                                                        <input type='checkbox' id='checkallusers' value=''> Select All<br/>
                                                        <div class="form-group">
                                                            <select name="users_id[]" id='sel_users' class="select2-multiple form-select "
                                                                multiple="multiple">
                                                                <option  value="0" disabled>Select Users</option>
                                                                
                                                                @foreach($users as $user)
                                                                    <option  value="{{$user->id}}">{{$user->name}}</option>
                                                                @endforeach
                                                               
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
                                                                <textarea class="form-control" placeholder="enter title here"
                                                                    id="floatingTextarea" name="title"></textarea>
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
<script type='text/javascript'>
    $(document).ready(function(){
      $("#checkallusers").change(function(){
        var checked = $(this).is(':checked'); // Checkbox state
   
        // Select all
        if(checked){
          $('#sel_users option').each(function() {
             $(this).prop('selected',true);
          });
        }else{
          // Deselect All
          $('#sel_users option').each(function() {
            $(this).prop('selected',false);
          });
        }
    
     });
    
     // Changing state of Checkbox
     $("#sel_users").change(function(){
    
       // When total options equals to total selected option
       if($("#sel_users option").length == $("#sel_users option:selected").length) {
          $("#checkallusers").prop("checked", true);
       } else {
          $("#checkallusers").prop("checked", false);
       }
      });
    });
    </script>
@endsection
