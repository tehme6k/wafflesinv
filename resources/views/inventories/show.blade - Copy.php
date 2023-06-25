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
        <!-- end row -->


        <div class="row">
            {{-- COL LABEL COST,CREATED DATE --}}
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pb-2">

                            <h5>Labels per roll: {{number_format($inventory->labels_per_roll)}}</h5>
                            <h5>Roll count: {{number_format($inventory->number_of_rolls)}}</h5>
                            <h5>Total labels: {{number_format($inventory->total_labels)}}</h5>
                            <h5>Total cost: ${{number_format($inventory->total_cost,2)}}</h5>
                            <h5>Reason: {{$inventory->reason->reason}}</h5>
                            <h5>Description: {{$inventory->description}}</h5>


                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->



        </div>
        <!-- end row -->
    </div>

</div>

@endsection
