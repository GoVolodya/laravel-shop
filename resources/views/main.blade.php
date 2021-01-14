@extends('master')
@section('content')
		<div class="row text-center py-4">
			<h1 class="col-12 display-4">Welcome to our shop</h1>
			<p class="col-12 h2 mb-0">We are selling different stuff for your garden</p>
		</div>
		<form action="{{route('main')}}" method="GET" class="row d-flex align-items-center justify-content-around my-3">
				<label for="price_from" class="col-10 col-md form-label h4 mb-0 text-center my-2">Price: from</label>
				<input type="text" name="price_from" id="price_from" value="{{request()->price_from}}" class="col-10 col-md form-control">
				<label for="price_to" class="col-10 col-md-1 form-label h4 mb-0 text-center my-2">to</label>
				<input type="text" name="price_to" id="price_to" value="{{request()->price_to}}" class="col-10 col-md form-control">
			
			<button type="submit" class="col-4 col-md btn btn-primary m-2">Show</button>
			<a href="{{route('main')}}" class="col-4 col-md btn btn-warning m-2">Clear&nbsp;filter</a>
		</form>
		<div class="row d-flex justify-content-around">
			@foreach ($products as $product)
			@include('card')
		@endforeach
		</div>
		<div class="row d-flex justify-content-center my-3">
			{{$products->links()}}
		</div>
@endsection