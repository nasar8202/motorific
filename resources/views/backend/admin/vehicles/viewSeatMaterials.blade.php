
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
                <h3>Seat Materails</h3>
                <p class="text-subtitle text-muted">View All Seat Materails List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Seat Materails</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Seat Materails List
                <a href="{{ route('createSeatMaterialForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Create Seat Material</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($SeatMaterials as $SeatMaterial)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $SeatMaterial->title }}</td>
                            <td><img src="{{ asset('materials/seat_material_iamges/'.$SeatMaterial->image) }}" width="100" height="100"></td>
                            <td>
                                <a href="{{ route('editSeatMaterial.edit',$SeatMaterial->id) }}"><span class="badge badge-success">Edit</span></a>
                                <a href="{{ route('deleteSeatMaterial.delete',$SeatMaterial->id) }}"><span class="badge badge-danger">Delete</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
