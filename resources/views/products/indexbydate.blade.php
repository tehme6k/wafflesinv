@extends('layout')

@section('content')

<ul>
    @foreach($products as $product)
        <li>{{ $product->name }}</li>
    @endforeach
</ul>
{!! $products->links('pagination::bootstrap-5') !!}

@endsection
