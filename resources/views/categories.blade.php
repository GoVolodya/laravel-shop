@extends('master')
@section('title')
		- Categories
@endsection
@section('content')
<div class="row text-center py-4">
	<h1 class="col-12 display-4">Welcome to categories</h1>
	<p class="col-12 h2 mb-0">We provide you a lot of categories of goods</p>
</div>
		<div class="row d-flex justify-content-around">
			@foreach ($categories as $category)
			<div class="col-10 col-sm-5 col-lg-3 card mx-2 my-3 p-3">
				<img src="{{ Storage::url($category->image) }}" class="img-fluid">
				<a href="{{route('category', $category->code)}}" class="h2 mb-0 mt-3 p-2 text-decoration-none text-dark text-center">{{ $category->name }}</a>
			</div>	
		@endforeach
		</div>
@endsection