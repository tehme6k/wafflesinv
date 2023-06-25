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
                                <h4 class="mb-sm-0">Labels in Production</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Production</li>
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

                                    {{-- <a class="btn btn-primary btn-rounded waves-effect waves-light" href="{{ route('p.create') }}"> Create New Product</a> --}}
                                    <p class="card-title-desc">
                                        <div class="col-lg-12 margin-tb">

                                                <h2>Total in production: </h2>

                                        </div>
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            {{-- <th>Part Number</th> --}}
                                            <th>Date/Time</th>
                                            <th>How Long Ago</th>
                                            <th>Product</th>
                                            <th>Flavor</th>
                                            <th>Amount Issued</th>
                                            <th>Amount Needed</th>
                                            <th>Amount Short By</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach ($productions as $production)

                                        @if($production->amount_needed > $production->amount_issued)
                                            <tr class="text-danger">
                                        @else
                                            <tr>
                                        @endif
                                            {{-- <td>{{ $production->product->part_number }}</td> --}}
                                            <td>{{ $production->created_at->format('m-d-y g:i a') }} </td>
                                            <td>{{ $production->created_at->diffForHumans() }}</td>
                                            <td>{{ $production->product->name }}</td>
                                            <td>{{ $production->product->flavor }}</td>
                                            <td>{{ number_format($production->amount_issued) }}</td>
                                            <td>{{ number_format($production->amount_needed) }}</td>
                                            <td>
                                                @if($production->amount_needed > $production->amount_issued)
                                                    {{ number_format($production->amount_needed - $production->amount_issued) }}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('productions.destroy',$production->id) }}" method="POST">

                                                    <a class="btn btn-primary" href="{{ route('productions.edit',$production->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $productions->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- end main content-->

@endsection
