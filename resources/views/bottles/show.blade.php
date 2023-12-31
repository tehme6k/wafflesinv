@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0">{{$bottle->bottle_size}} Bottle (Created by: {{$bottle->createdBy->name}})</h2>


                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('bottles.index') }}">All Bottles</a></li>
                            <li class="breadcrumb-item active">Bottle Info</li>
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
                                    <th scope="row">Label cost</th>
                                    <td>${{$bottle->label_cost}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total products used by</th>
                                    <td>{{$bottle->products->count()}}</td>
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
