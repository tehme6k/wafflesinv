@extends('layout')

@section('content')

<ul>
    @foreach($products as $product)
        <li>{{ $product->name }} - {{ $product->total_labels }}</li>
    @endforeach
</ul>
{{-- {!! $products->links('pagination::bootstrap-5') !!} --}}

@endsection
