@extends('backend.admin.layouts.app')
@section('title', 'view Vehicles Features List')
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
                    <h3>Agent Sale</h3>
                    <p class="text-subtitle text-muted">View All Agent Sales List</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Agent Sale</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Agent Sale
                    
                </div>

                <div class="card-body">
                    <table class="table table-striped tables_admin_data" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Total Vehicle</th>
                                <th>Reg Number</th>
                                <th>Sold Vehicle Charges </th>
                                <th>Total Sold Vehicles</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                
                            @endphp
                            @forelse ($agentSale as $agentSal)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $agentSal->name }}</td>
                                    <td>{{ $agentSal->email }}</td>
                                    @if ($agentSal->vehicles)
                                        <td>{{ count($agentSal->vehicles) }}</td>
                                        <td>
                                            @forelse ($agentSal->vehicles as $vehicles)
                                                <span
                                                    class="bg-dark text-white p-2">{{ $vehicles->vehicle_registartion_number }}</span><br>
                                            @empty
                                            @endforelse
                                        </td>
                                    @endif
                                    @if ($agentSal->vehicles)
                                        <td>
                                            @forelse ($agentSal->vehicles as $vehicles)
                                            £ {{ $vehicles->vehicleWinningCharge->vehicle_charges??'Not Sold' }} <br>
                                                {{-- <span class="bg-dark text-white p-2">{{ $vehicles->vehicle_registartion_number }}</span><br> --}}
                                            @empty
                                            @endforelse
                                        </td>
                                    @endif
                                    {{-- <td>{{ $agentSal->post_code }}</td> --}}
                                    @if ($agentSal->vehicles)
                                        <td>
                                            @forelse ($agentSal->vehicles as $vehicles)
                                            @if($vehicles->vehicleWinningCharge)
                                                1
                                            @endif
                                            @empty
                                            @endforelse
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Sale Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
