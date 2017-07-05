@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">All messages</div>  
		<div class="panel-body">      
			@foreach($conversations as $conversation)
			<a href="{{ '/messages/t/' . $conversation->path }}" class="media-heading">
				<h5>{{ $conversation->name }}</h5>
			</a>
			@endforeach
		</div>
	</div>
</div>
@endsection