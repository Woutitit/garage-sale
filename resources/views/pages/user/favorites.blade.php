@extends('layouts.app')

@section('content')
<div class="container">
	@if(Auth::check())
	<div class="page-header">
		<h1>My favorites</h1>
	</div>
	@else
	<div class="page-header">
		<h1>Favorites of {{ $user_name }}</h1>
	</div>
	@endif
</div>
@endsection