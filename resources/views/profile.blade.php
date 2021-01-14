@extends('layouts.app')

@section('content')
<div class="row text-center py-4">
    <h1 class="col-12 display-4">Profile page is curently unavailable</h1>
    <p class="col-12 h2 mb-0">Please visit another section of our Shop</p>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
