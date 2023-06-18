@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Bottle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bottles.index') }}"> Back</a>
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

    <form action="{{ route('bottles.update',$bottle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bottle Size:</strong>
                    <input type="text" value="{{$bottle->bottle_size}}" name="bottle_size" class="form-control" placeholder="Bottle Size">
                </div>
            </div>

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Label Cost</strong>
                    <input type="number" value="{{$bottle->label_cost}}" step=".0000001" name="label_cost" class="form-control" placeholder="Label Cost">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


    </form>
@endsection
