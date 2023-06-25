@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0">{{$inventory->product->name}} {{$inventory->product->flavor}} (Created by: {{$inventory->createdBy->name}})</h2>


                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('inventories.index') }}">All Inventory</a></li>
                            <li class="breadcrumb-item active">Inventory Info</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        </div>



        <div class="row">

            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pb-2">

                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Labels per roll</th>
                                    <td>{{number_format($inventory->labels_per_roll)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Roll count</th>
                                    <td>{{number_format($inventory->number_of_rolls)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total labels</th>
                                    <td>{{number_format($inventory->total_labels)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total cost</th>
                                    <td>${{number_format($inventory->total_cost,2)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Reason</th>
                                    <td>{{$inventory->reason->reason}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td>{{$inventory->description}}</td>
                                </tr>
                            </tbody>
                        </table>



                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->



        </div>
        <!-- end row -->
    </div>

</div>

@endsection
