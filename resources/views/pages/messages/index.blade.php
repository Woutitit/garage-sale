@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">All messages</div>  
		<div class="panel-body">      
			<table class="table table-hover table-responsive">
				<tbody>
					<tr>
						<td>
							<div class="media">
								<div class="media-left">
									<img class="media-object" style="width:48px;height:48px" src="{{ asset('uploads/items/1498267957-beef-7795x5725-steak-food-cooking-grill-vegetables-meal-meat-tomato-408.jpg') }}" alt="Generic placeholder image">
								</div>
								<div class="media-body">
									<h5 class="media-heading">Media heading</h5>
									<p class="summary">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection