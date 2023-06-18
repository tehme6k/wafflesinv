@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('inventories.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('inventories.store') }}" method="POST">
    @csrf

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product:</strong>
            <select name="product_id"  id="product_id" class="form-control">
                <option value="">-- Select Product --</option>
                @foreach ($products as $data)
                <option value="{{$data->id}}">
                    {{$data->name}} {{$data->flavor}}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Labels per roll</strong>
                <input type="number" name="labels_per_roll" class="form-control" placeholder="Labels per roll">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number of rolls</strong>
                    <input type="number" name="number_of_rolls" class="form-control" placeholder="Number of rolls">
                </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>


@endsection
