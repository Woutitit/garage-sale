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
	<div class="row">
		@if( count($items) > 0)
		@foreach ($items as $item)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="..." alt="...">
				<div class="caption">
					<h3>{{ $item->name }}</h3>
					<p>{{ $item->description }}</p>
					<p>
						<a href="{{ '/items/' . $item->id }}" role="button" class="btn btn-primary">Bekijken</a>
					</p>
				</div>
			</div>
		</div>
		@endforeach
		@else
		<p>You have not favourited any items yet.</p>
		@endif
	</div>
</div>
@endsection