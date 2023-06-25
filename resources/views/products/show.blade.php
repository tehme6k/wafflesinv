@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0">{{$product->part_number}} - {{$product->name}} {{$product->flavor}} (Created by: {{$product->createdBy->name}})</h2>


                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">All Products</a></li>
                            <li class="breadcrumb-item active">Product Info</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        </div>



        <div class="row">

            <div class="col-xl-5">

                <div class="card">
                    <div class="card-body pb-5">

                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Total rolls</th>
                                    <td>{{$product->inventories->sum('number_of_rolls')}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total labels</th>
                                    <td>{{number_format($product->inventories->sum('total_labels'))}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total cost</th>
                                    <td>${{$product->inventories->sum('total_cost')}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Location</th>
                                    <td>{{$product->location}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bottle size</th>
                                    <td>{{$product->bottle->bottle_size}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Label cost</th>
                                    <td>${{$product->bottle->label_cost}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total inventories</th>
                                    <td>{{$product->inventories->count()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Notes</th>
                                    <td>{{$product->notes}}</td>
                                </tr>
                            </tbody>
                        </table>



                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-7">

                <div class="card">
                    <div class="card-body pb-2">

                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    {{-- <th>Labels per Roll</th>
                                    <th>Roll Count</th> --}}
                                    <th>Time</th>
                                    <th>Total Labels</th>
                                    <th>Reason</th>
                                    <th>Action</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                @foreach ($inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->created_at->diffForHumans() }}</td>
                                    <td>{{ number_format($inventory->total_labels) }}</td>
                                    <td>{{ $inventory->reason->reason }}</td>
                                    <td><a class="btn btn-info btn-sm" href="{{ route('inventories.show',$inventory->id) }}">Show</a></td>
                                </tr>
                                @endforeach
                                 <!-- end -->
                            </tbody><!-- end tbody -->
                        </table> <!-- end table -->
                        {!! $inventories->links('pagination::bootstrap-5') !!}



                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->



        </div>
        <!-- end row -->
    </div>

</div>

@endsection
