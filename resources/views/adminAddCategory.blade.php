@extends('admin')
@isset($category)
@section('title')
			- Edit category
@endsection
		@else
		@section('title')
			- Create category
@endsection
@endisset
@section('adminContent')
	<div>
		<form
			@isset($category)
				action="{{ route('categories.update', $category) }}"
			@else
				action="{{ route('categories.store') }}"
			@endisset
			method="post" enctype="multipart/form-data">
		@csrf
		@error('code')
			<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
			<label for="code" class="col-10 col-md-3 form-label m-3 h2 mb-0">Code:</label>
			<input type="text" name="code" value="{{ old('code', isset($category) ? $category->code : null) }}" class="col-10 col-md-9 form-control col-6">
		</div>
		@error('name')
			<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
			<label for="name" class="col-10 col-md-3 form-label m-3 h2 mb-0">Name:</label>
			<input type="text" name="name" value="{{ old('name', isset($category) ? $category->name : null) }}" class="col-10 col-md-9 form-control col-6">
		</div>
		@error('description')
			<p class="text-danger text-center">{{ $message }}</p>		
		@enderror
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
			<label for="description" class="col-10 col-md-3 form-label m-3 h2 mb-0">Description:</label>
			<textarea name="description" cols="30" rows="10" style="resize:none;" class="col-10 col-md-9 form-control col-6">{{ old('description', isset($category) ? $category->description : null) }}</textarea>
		</div>
		<div class="form-group row d-flex justify-content-center align-items-center my-3 text-center">
			<label for="image" class="col-10 col-md-3 form-label m-3 h2 mb-0">Image:</label>
			<input type="file" name="image" class="col-10 col-md-9">
		</div>
		@isset($category)
			@method('PUT')
		@endisset
		<div class="row d-flex justify-content-center">
			<input type="submit" value="Create new category" class="col-6 btn btn-success">
		</div>
		</form>
	</div>
@endsection