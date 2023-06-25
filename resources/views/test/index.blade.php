@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0">{{$user->name}} (Created at: {{$user->created_at->format('m-d-y g:i a')}})</h2>


                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Testing</li>
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
                                    <th scope="row">User email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total bottles</th>
                                    <td>{{$user->bottles->count()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total reasons</th>
                                    <td>{{$user->reasons->count()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total products</th>
                                    <td>{{$user->products->count()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total inventories</th>
                                    <td>{{$user->inventories->count()}}</td>
                                </tr>
                            </tbody>
                        </table>



                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->






                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->



        </div>
        <!-- end row -->
    </div>

</div>

@endsection
