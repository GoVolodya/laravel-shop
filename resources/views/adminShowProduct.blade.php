@extends('admin')
@section('title')
			- Administrate product {{ $product->name }}
@endsection
@section('adminContent')
<div>
	<div class="row text-center">
		<h1 class="col d-flex justify-content-center mt-2">Products show here</h1>
	</div>
	<div class="row d-flex justify-content-around">
		<div class="col-10 col-md-5 m-4 text-center">
			<img src="{{ Storage::url($product->image) }}" class="img-fluid">
		</div>
		<div class="col-10 col-md-5">
			<ul class="list-group">
				<li class="list-group-item">
					<p class="h2 mb-0">ID:{{ $product->id }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Code:{{ $product->code }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Name:{{ $product->name }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Price:{{ $product->price }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Description:{{ $product->description }}</p>
				</li>
				{{-- <li class="list-group-item">
					<p>Products:{{ $product->products->count() }}</p>
				</li> --}}
			</ul>
		</div>
	</div>
</div>
@endsection