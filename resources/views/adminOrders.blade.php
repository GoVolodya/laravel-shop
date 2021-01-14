@extends('admin')
@section('title')
			- Administrate orders
@endsection
@section('adminContent')
<div>
	<h1 class="row mt-2 d-flex justify-content-center">Orders options</h1>
</div>
<div class="row">
	<table class="col-12 table table-dark">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Phone</th>
				<th scope="col">Date</th>
				<th scope="col">Sum</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
			<tr>
				<th scope="row">{{ $order->id }}</th>
				<td>{{ $order->name }}</td>
				<td>{{ $order->phone }}</td>
				<td>{{ $order->created_at->format('H:i - d.m.Y') }}</td>
				<td>{{ $order->sum() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection