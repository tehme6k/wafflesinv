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
                                <h4 class="mb-sm-0">Bottles</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">All Bottles</li></li>
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

                                    <a class="btn btn-primary btn-rounded waves-effect waves-light" href="{{ route('bottles.create') }}"> Create New Bottle</a>
                                    <p class="card-title-desc">
                                        <div class="col-lg-12 margin-tb">

                                                {{-- <h2>Bottles?</h2> --}}

                                        </div>
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Bottle Size</th>
                                            <th>Label Cost</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach ($bottles as $bottle)
                                        <tr>
                                            <td>{{ $bottle->id }}</td>
                                            <td>{{ $bottle->bottle_size }}</td>
                                            <td>{{ $bottle->label_cost }}</td>
                                            <td>
                                                    <a class="btn btn-info" href="{{ route('bottles.show',$bottle->id) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('bottles.edit',$bottle->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $bottles->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- end main content-->


@endsection
