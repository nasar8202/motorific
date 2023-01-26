
@extends('backend.admin.layouts.app')
@section('title','add Number Of Keys ')
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
                <h3>Number Of Keys</h3>
                <p class="text-subtitle text-muted">Number Of Keys</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Number Of Keys</li>
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
                    <h4 class="card-title">Add Number Of Keys</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="container-fluid">

                            <div class="row">

                                <form action="{{ route('storeNumberOfKeys') }}" method="POST" class="oveflow-x-scroll p-0">
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
                                    
                                    <table class="table table-bordered tables_admin_data" id="dynamicAddRemove">
                                        <tr>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="number" name="addMoreInputFields[0][number_of_key]" placeholder="Enter Number Of Keys" class="form-control w-160" />
                                            </td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add More</button></td>
                                        </tr>
                                    </table>
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
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][number_of_key]" placeholder="Enter Number Of Keys" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Remove </button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
