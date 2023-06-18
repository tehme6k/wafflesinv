@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD Waffles Inventory</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bottles.create') }}"> Create New Bottle</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Bottle Size</th>
            <th>Label Cost</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bottles as $bottle)
        <tr>
            <td>{{ $bottle->id }}</td>
            <td>{{ $bottle->bottle_size }}</td>
            <td>{{ $bottle->label_cost }}</td>
            <td>
                <form action="{{ route('bottles.destroy',$bottle->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('bottles.show',$bottle->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('bottles.edit',$bottle->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $bottles->links('pagination::bootstrap-5') !!}

@endsection
