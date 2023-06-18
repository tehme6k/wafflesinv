@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Bottle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bottles.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bottle Size:</strong>
                {{ $bottle->bottle_size }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Label Cost:</strong>
                {{ $bottle->label_cost }}
            </div>
        </div>
    </div>
@endsection
