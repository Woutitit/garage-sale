@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@foreach ($items as $item)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="..." alt="...">
				<div class="caption">
					<h3>{{ $item->name }}</h3>
					<p>{{ $item->description }}</p>
					<p>
						<a href="{{ '/items/' . $item->id }}" role="button" class="btn btn-primary">Bekijken</a>
						@if ($item->user_id = Auth::id())
						<a href="{{ '/items/' . $item->id . '/edit' }}" role="button" class="btn btn-default">Bewerken</a>
						@endif
					</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection