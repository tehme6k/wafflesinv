@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Part Number:</strong>
                {{ $product->part_number }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Flavor:</strong>
                {{ $product->flavor }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ Str::upper($product->location) }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bottle Size:</strong>
                {{ $product->bottle->bottle_size }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Rolls:</strong>
                {{ $product->inventories->sum('number_of_rolls') }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Labels:</strong>
                {{number_format($product->inventories->sum('total_labels'))}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Label Cost:</strong>
                {{ $product->bottle->label_cost }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Toal Cost:</strong>
                ${{$product->inventories->sum('total_cost')}}
                {{-- ${{number_format($product->bottle->label_cost*$product->inventories->sum('total_labels'),2)}} --}}

            </div>
        </div>
    </div>

    <div>

        <table class="table table-bordered">
            <tr>
                <th>Labels per Roll</th>
                <th>Roll Count</th>
                <th>Total Labels</th>
            </tr>
            @foreach ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->labels_per_roll }}</td>
                <td>{{ $inventory->number_of_rolls }}</td>
                <td>{{ number_format($inventory->total_labels) }}</td>
            </tr>
            @endforeach
        </table>
        {!! $inventories->links('pagination::bootstrap-5') !!}

    </div>
@endsection
