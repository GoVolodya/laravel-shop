@extends('admin')
@section('title')
			- Administrate categories
@endsection
@section('adminContent')
	<div class="row text-center m-4">
		<h1 class="col">Categories options</h1>
	</div>
	@foreach ($categories as $category)
	<div class="card m-4">
			<div class="row d-flex justify-content-around m-4">
				<div class="col-12 col-sm-6 p-4 text-center">
					<img src="{{ Storage::url($category->image) }}" class="img-fluid">
				</div>
				<div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
					<ul class="list-group">
						<li class="list-group-item"><p class="h4 mb-0">ID: {{ $category->id }}</p></li>
						<li class="list-group-item"><p class="h4 mb-0">Code: {{ $category->code }}</p></li>
						<li class="list-group-item"><p class="h4 mb-0">{{ $category->name }}</p></li>
						<li class="list-group-item"><p class="h4 mb-0">{{ $category->description }}</p></li>
					</ul>
				</div>
				<div class="col m-4">
						<a href="{{ route('categories.show', $category) }}" class="col m-2 btn btn-primary">Full iformation</a>
						<a href="{{ route('categories.edit', $category) }}" class="col m-2 btn btn-warning">Change category</a>
						<form action="{{route('categories.destroy', $category)}}" method="post">
							@csrf
							@method('DELETE')
							<input type="submit" value="Delete category" class="col btn m-2 btn-danger">
						</form>
				</div>
			</div>
		</div>
	@endforeach

	<div class="row d-flex justify-content-center">
		<a href="{{ route('categories.create') }}" class="btn btn-success col-6">Create new category</a>
	</div>
@endsection