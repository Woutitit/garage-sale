@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Messages with Wout Borghgraef</div>
				<div class="panel-body">
				@if(count ($messages) > 0)
					@foreach ($messages as $message)
					<p>{{ $message->message }}</p>
					@endforeach	
					@else
					<p>You don't have common messages yet.</p>
					@endif
				</div>
				<div class="panel-footer">
					<form action="/messages" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="user_url" value="{{ $user_url }}">
						<div class="input-group">
							<input class="form-control" placeholder="Send a message..." name="msg">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">Send</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection