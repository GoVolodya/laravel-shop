@extends('master')
@section('title')
		- Admin @yield('title')
@endsection
@section('content')
		<div class="row text-center">
			<h1 class="col">Admin page</h1>
		</div>
		<nav class="navbar navbar-dark bg-dark d-flex justify-content-around">
			<a href="{{ route('categories.index') }}" class="text-center col-10 col-lg-4 h2 my-2 text-light text-decoration-none">Categories options</a>
			<a href="{{ route('products.index') }}" class="text-center col-10 col-lg-4 h2 my-2 text-light text-decoration-none">Products options</a>
			<a href="{{ route('adminOrders') }}" class="text-center col-10 col-lg-4 h2 my-2 text-light text-decoration-none">Orders options</a>
		</nav>
		@yield('adminContent')
@endsection