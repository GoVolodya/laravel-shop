@extends('admin')
@section('title')
			- Administrate category {{ $category->name }}
@endsection
@section('adminContent')
<div>
	<div class="row text-center">
		<h1 class="col d-flex justify-content-center mt-2">Categories show here</h1>
	</div>
	<div class="row d-flex justify-content-around">
		<div class="col-10 col-md-5 m-4 text-center">
			<img src="{{ Storage::url($category->image) }}" class="img-fluid">
		</div>
		<div class="col-10 col-md-5">
			<ul class="list-group">
				<li class="list-group-item">
					<p class="h2 mb-0">ID:{{ $category->id }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Code:{{ $category->code }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Name:{{ $category->name }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Products:{{ $category->products->count() }}</p>
				</li>
				<li class="list-group-item">
					<p class="h2 mb-0">Description:{{ $category->description }}</p>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection