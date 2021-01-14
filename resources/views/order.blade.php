@extends('master')
@section('title')
		- Order
@endsection
@section('content')
<div class="row text-center py-4">
	<h1 class="col-12 display-4">You allmost done an order</h1>
	<p class="col-12 h2 mb-0">This is your sum: ${{ $order->sum() }}</p>
</div>
		<form action="{{ route('orderConfirm') }}" method="post" class="row d-flex flex-column justify-content-center align-items-center">
			@csrf
			<label for="name" class="h2 mb-1 col-10 col-md-6 mt-4 form-label">Enter your name:</label>
			<input type="text" name="name" class="col-10 col-md-6 form-control" placeholder="Name">
			<label for="phone" class="h2 mb-1 col-10 col-md-6 mt-4 form-label">Enter your phone:</label>
			<input type="text" name="phone" class="col-10 col-md-6 form-control" placeholder="+380(XX) XX-XX-XXX">
			<input type="submit" value="Confirm order" class="col-10 col-md-6 mt-4 btn btn-success">
		</form>
@endsection