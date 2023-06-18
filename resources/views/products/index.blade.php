@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Total Labels: {{ number_format($total_labels) }}</h2>
                <h2>Total Cost: ${{  number_format($total_cost, 2) }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
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
            <th>Part Number</th>
            <th>Name</th>
            <th>Flavor</th>
            <th>Location</th>
            <th>Total Inventory</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->part_number }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->flavor }}</td>
            <td>{{ $product->location }}</td>
            <td>{{ number_format($product->inventories->sum('total_labels')) }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links('pagination::bootstrap-5') !!}

@endsection
