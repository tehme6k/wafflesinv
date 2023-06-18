@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Total Labels: {{ $inventories->sum('total_labels') }}</h3>
                <h3>Total Cost: ${{ $inventories->sum('total_cost') }}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('inventories.create') }}">Adjust Inventory</a>
                {{-- <a class="btn btn-success" href="{{ route('inventories.remove') }}"> Remove From Inventory</a> --}}
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
            <th>Product</th>
            <th>Labels Per Roll</th>
            <th>Roll Count</th>
            <th>Total Labels</th>
            <th>Date/Time</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($inventories as $inventory)
        <tr>
            <td>{{ $inventory->product->part_number }}</td>
            <td>{{ $inventory->product->name }} {{ $inventory->product->flavor }}</td>
            <td>{{ $inventory->labels_per_roll }}</td>
            <td>{{ $inventory->number_of_rolls }}</td>
            <td>{{ number_format($inventory->total_labels) }}</td>
            <td>{{ $inventory->created_at->format('m-d-y g:i a') }} ({{ $inventory->created_at->diffForHumans() }}) </td>

            <td>
                    <a class="btn btn-info" href="{{ route('products.show',$inventory->product->id) }}">Show</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $inventories->links('pagination::bootstrap-5') !!}

@endsection
