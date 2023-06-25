@extends('admin.admin_master')
@section('admin')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Create new reason</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('reasons.index') }}">All Reasons</a></li>
                                            <li class="breadcrumb-item active">New Reason</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <form class="custom-validation" action="{{ route('reasons.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Reason:</label>
                                                <input type="text" name="reason" class="form-control" required placeholder="Reason"/>
                                            </div>

                                            <div class="mb-3">
                                                <label>Action:</label>
                                                <select name="action"  id="action" class="form-control">
                                                    <option value="">-- Select Action --</option>

                                                    <option value="add">Add</option>
                                                    <option value="remove">Remove</option>

                                                </select>
                                            </div>

                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->


                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

            <!-- end main content-->


@endsection
