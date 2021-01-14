@extends('master')
@section('title')
		- {{ ucfirst($product->name) }}
@endsection
@section('content')
		<div class="row my-3 text-center">
			<h1 class="col-12">{{ ucfirst($product->name) }} is the leaders choice</h1>
		</div>
		<div class="row d-flex justify-content-center">
			@include('card')
		</div>
@endsection