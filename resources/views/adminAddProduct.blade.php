@extends('admin')
@isset($product)
@section('title')
			- Edit product
@endsection
		@else
		@section('title')
			- Add product
@endsection
@endisset
@section('adminContent')
<div>
	<form @isset($product)
	action="{{ route('products.update', $product) }}"
			@else
			action="{{ route('products.store') }}"
	@endisset
	 method="post" enctype="multipart/form-data">
		@csrf
		@error('code')
		<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
			<label for="code" class="col-10 col-md-3 form-label m-3 h2 mb-0">Code:</label>
			<input type="text" name="code" value="{{ old('code', isset($product) ? $product->code : null) }}" class="col-10 col-md-9 form-control col-6">
		</div>
@error('name')
		<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
		<label for="name" class="col-10 col-md-3 form-label m-3 h2 mb-0">Name:</label>
		<input type="text" name="name" value="{{ old('name', isset($product) ? $product->name : null) }}" class="col-10 col-md-9 form-control col-6">
		</div>
		@error('category')
		<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
		<label for="category" class="col-10 col-md-3 form-label m-3 h2 mb-0">Category:</label>
		<select name="category" class="col-10 col-md-9 form-control col-6">
			@foreach ($categories as $category)
				<option value="{{ $category->id }}"
					@isset($product)
							@if ($product->category_id == $category->id)
									selected
							@endif
					@endisset
					>{{ $category->name }}</option>		
			@endforeach
		</select>
		</div>
		@error('price')
		<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
		<label for="price" class="col-10 col-md-3 form-label m-3 h2 mb-0">Price:</label>
		<input type="text" name="price" value="{{ old('price', isset($product) ? $product->price : null) }}" class="col-10 col-md-9 form-control col-6">
		</div>
		@error('description')
		<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
		<label for="description" class="col-10 col-md-3 form-label m-3 h2 mb-0">Description:</label>
		<textarea name="description" cols="30" rows="10" style="resize:none;" class="col-10 col-md-9 form-control col-6">{{ old('description', isset($product) ? $product->description : null) }}</textarea>
		</div>
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
		<label for="image" class="col-10 col-md-3 form-label m-3 h2 mb-0">Image:</label>
		<input type="file" name="image" class="col-10 col-md-9">
		</div>
		@isset($product)@method('PUT')@endisset
		<div class="row d-flex justify-content-center">
			<input type="submit" value="@isset($product) Edit product @else Add new product  @endisset" class="btn btn-success col-6">
		</div>
		
	</form>
</div>
@endsection