@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create item</div>
				<div class="panel-body">
					<form role="form" method="POST" action="http://garagesale.app/login" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input id="name" type="text" name="name" value="" required="required" autofocus="autofocus" class="form-control" placeholder="Give your item a name...">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea class="form-control" id="description" placeholder="Tell something more about the item"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-md-4 control-label">Price</label>
							<div class="col-md-6">
								<input id="price" type="price" name="name" value="" required="required" autofocus="autofocus" class="form-control" placeholder="Give a fair price">
							</div>
						</div>
						<div class="form-group">
							<label for="categories" class="col-md-4 control-label">Category</label>
							<div class="col-md-6">
								<select class="form-control" id="categories">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="foto1" class="col-md-4 control-label">Foto 1</label>
							<div class="col-md-6">
								<input type="file" id="foto1">
							</div>
						</div>

						<div class="form-group">
							<label for="foto2" class="col-md-4 control-label">Foto 2</label>
							<div class="col-md-6">
								<input type="file" id="foto2">
							</div>
						</div>

						<div class="form-group">
							<label for="foto3" class="col-md-4 control-label">Foto 3</label>
							<div class="col-md-6">
								<input type="file" id="foto3">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Create</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection