@extends('layouts.app')

@section('content')
<div class="container">
	@if(Auth::check())
	<h1>My Items</h1>
	<a href="/items/create" class="btn btn-success">Create item</a>
	@else
	<h1>Items of Wout Borghgraef</h1>
	@endif
	@if (count($items) > 0)
	<div class="row">
		@foreach ($items as $item)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="..." alt="...">
				<div class="caption">
					<h3>{{ $item->name }}</h3>
					<p>{{ $item->description }}</p>
					<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
</div>
@endsection