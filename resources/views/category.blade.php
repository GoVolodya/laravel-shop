@extends('master')
@section('title')
		- {{ $category->name }}
@endsection
@section('content')
<div class="row text-center py-4">
	<h1 class="col-12 display-4">{{ $category->description }}</h1>
	<p class="col-12 h2 mb-0">Here you can see lots of trees we can supply you with</p>
</div>
<div class="row d-flex justify-content-around">
	@foreach ($category->products as $product)
	<div class="col-10 col-sm-6 col-md-4">
			
			<a href="{{route('product', [$category->code, $product->code])}}" class="card mx-2 my-3 p-3 text-decoration-none">
					<img src="{{ Storage::url($product->image) }}" class="img-fluid">
					<p class="h2 mb-0 mt-2 p-2 text-center text-dark">{{ $product->name }}</p>
				</a>
			
	</div>
	@endforeach
</div>
@endsection