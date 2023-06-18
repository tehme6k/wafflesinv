@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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

<form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Part Number:</strong>
                <input type="text" value="{{$product->part_number}}" name="part_number" class="form-control" placeholder="Part Number">
            </div>
        </div>

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" value="{{$product->name}}" name="name" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Flavor:</strong>
                <input type="text" value="{{$product->flavor}}" name="flavor" class="form-control" placeholder="Flavor">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" value="{{$product->location}}" name="location" class="form-control" placeholder="Location">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bottle Size:</strong>
                <select name="bottle_id"  id="bottle_id" class="form-control">
                    <option value="{{$product->bottle->id}}">{{$product->bottle->bottle_size}}</option>
                    @foreach ($bottles as $data)
                    <option value="{{$data->id}}">
                        {{$data->bottle_size}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

{{-- <ul>
    @foreach($bottles as $bottle)
        <li>{{$bottle->id}}</li>
    @endforeach
</ul> --}}
@endsection
