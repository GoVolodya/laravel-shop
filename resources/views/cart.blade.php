@extends('master')
@section('title')
		- Cart
@endsection
@section('content')
<div class="row text-center py-4">
	<h1 class="col-12 display-4">There is your order</h1>
	<p class="col-12 h2 mb-0">This products will serve you for long</p>
</div>
		<div class="row d-flex justify-content-around">
			@foreach ($order->products as $product)
			<div class="card m-2 p-2 col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="col-6">
						<img src="{{ Storage::url($product->image) }}" class="img-fluid">
					</div>
					<div class="col-6">
						<ul class="list-group ml-1">
							<li class="list-group-item p-1 text-center"><p class="h3 mb-0">{{ $product->name }}</p></li>
							<li class="list-group-item p-1 text-center"><p class="h3 mb-0">Price: ${{ $product->price }}</p></li>
							<li class="list-group-item p-1 text-center"><p class="h3 mb-0">Q-ty: {{ $product->pivot->count }}</p></li>
							<li class="list-group-item p-1 text-center"><p class="h3 mb-0">Sum: ${{ $product->sum() }}</p></li>
							<li class="list-group-item p-1 text-center">
								<form action="{{ route('cartAdd', $product) }}" method="post">
									@csrf
									<button type="submit" class="btn btn-warning">Add one more</button>
								</form>
							</li>
							<li class="list-group-item p-1 text-center">
								<form action="{{ route('cartRemove', $product) }}" method="post">
									@csrf
									<button type="submit" class="btn btn-danger">Remove one</button>
								</form>
							</li>
						</ul>
					</div>
					</div>
			</div>
		@endforeach
		</div>
		<div class="row mt-4 d-flex justify-content-center align-items-center">
			<p class="col-10 col-sm-5 p-2 h3 mb-0 text-center">Order sum: ${{ $order->sum() }}</p>
			<a href="{{ route('order') }}" class="col-10 col-sm-5 p-2 btn btn-success">Make order</a>
		</div>
@endsection