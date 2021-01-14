<div class="card col-10 col-sm-5 col-md-3 my-3 mx-2 py-3 d-flex flex-column text-center">
		<h2>{{ $product->name }}</h2>
		<div><img src="{{ Storage::url($product->image) }}" class="img-fluid img-thumbnail"></div>
		<p>${{ $product->price }}</p>
		<p>{{ $product->description }}</p>
		<form action="{{ route('cartAdd', $product) }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success">Add to cart</button>
		</form>
	</div>