@extends('admin.admin_master')
@section('admin')





            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="page-content">
                <div class="container-fluid">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                     @endif

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Inventory</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Tables</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <a class="btn btn-primary btn-rounded waves-effect waves-light" href="{{ route('inventories.create') }}">Inventory adjustment</a>
                                    <p class="card-title-desc">
                                        <div class="col-lg-12 margin-tb">
                                            <h3>Total Labels: {{ $inventories->sum('total_labels') }}</h3>
                                            <h3>Total Cost: ${{ $inventories->sum('total_cost') }}</h3>
                                        </div>
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Part Number</th>
                                            <th>Product</th>
                                            <th>Labels Per Roll</th>
                                            <th>Roll Count</th>
                                            <th>Total Labels</th>
                                            <th>Date/Time</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach ($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->product->part_number }}</td>
                                            <td>{{ $inventory->product->name }} {{ $inventory->product->flavor }}</td>
                                            <td>{{ $inventory->labels_per_roll }}</td>
                                            <td>{{ $inventory->number_of_rolls }}</td>
                                            <td>{{ number_format($inventory->total_labels) }}</td>
                                            <td>{{ $inventory->created_at->format('m-d-y g:i a') }} ({{ $inventory->created_at->diffForHumans() }}) </td>

                                            <td>
                                                    <a class="btn btn-info" href="{{ route('inventories.show',$inventory->id) }}">Show</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $inventories->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- end main content-->


@endsection
