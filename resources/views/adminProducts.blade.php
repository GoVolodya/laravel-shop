@extends('admin')
@section('title')
			- Administrate products
@endsection
@section('adminContent')
	<div class="row text-center m-4">
		<h1 class="col">Products options</h1>
	</div>
	@foreach ($products as $product)
	<div class="card m-4">
		<div class="row d-flex justify-content-around m-4">
			<div class="col-12 col-sm-6 p-4 text-center">
				<img src="{{ Storage::url($product->image) }}" class="img-fluid">
			</div>
			<div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
				<ul class="list-group">
					<li class="list-group-item"><p class="h4 mb-0">ID: {{ $product->id }}</p></li>
					<li class="list-group-item"><p class="h4 mb-0">Code: {{ $product->code }}</p></li>
					<li class="list-group-item"><p class="h4 mb-0">{{ $product->name }}</p></li>
					<li class="list-group-item"><p class="h4 mb-0">${{ $product->price }}</p></li>
					<li class="list-group-item"><p class="h4 mb-0">{{ $product->description }}</p></li>
				</ul>
			</div>
			<div class="col m-4">
				<a href="{{ route('products.show', $product) }}" class="col m-2 btn btn-primary">Full iformation</a>
				<a href="{{ route('products.edit', $product) }}" class="col m-2 btn btn-warning">Change product</a>
				<form action="{{route('products.destroy', $product)}}" method="post">
					@csrf
					@method('DELETE')
					<input type="submit" value="Delete product" class="col btn m-2 btn-danger">
				</form>
			</div>
		</div>
	</div>
	@endforeach
	<div class="row d-flex justify-content-center">
		<a href="{{ route('products.create') }}" class="btn btn-success col-6">Add new product</a>
	</div>
</div>
@endsection