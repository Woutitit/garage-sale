@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit item</div>
				<div class="panel-body">
					<form role="form" method="POST" action="{{ '/items/' . $item->id }}" class="form-horizontal" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input id="name" type="text" name="name" value="{{ $item->name ? $item->name : '' }}" autofocus="autofocus" class="form-control" placeholder="Give your item a name...">

								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
							<label for="description" class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea class="form-control" id="description" name="description" placeholder="Tell something more about the item">{{ $item->description ? $item->description : '' }}</textarea>

								@if ($errors->has('description'))
								<span class="help-block">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
							<label for="price" class="col-md-4 control-label">Price</label>
							<div class="col-md-6">
								<input id="price" type="price" name="price" value="{{ $item->price ? $item->price : '' }}" autofocus="autofocus" class="form-control" placeholder="Give a fair price">

								@if ($errors->has('price'))
								<span class="help-block">
									<strong>{{ $errors->first('price') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
							<label for="category" class="col-md-4 control-label">Category</label>
							<div class="col-md-6">
								<select class="form-control" id="category" name="category">
									@foreach($categories as $cat)
									<option {{ $item->category === $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
									@endforeach
								</select>

								@if ($errors->has('categories'))
								<span class="help-block">
									<strong>{{ $errors->first('categories') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('picture_1') ? ' has-error' : '' }}">
							<label for="picture1" class="col-md-4 control-label">Foto 1</label>
							<div class="col-md-6">
								<input type="file" id="picture1" name="picture_1">

								@if ($errors->has('picture_1'))
								<span class="help-block">
									<strong>{{ $errors->first('picture_1') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('picture_2') ? ' has-error' : '' }}">
							<label for="picture2" class="col-md-4 control-label">Foto 2</label>
							<div class="col-md-6">
								<input type="file" id="picture2" name="picture_2">

								@if ($errors->has('picture_2'))
								<span class="help-block">
									<strong>{{ $errors->first('picture_2') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('picture_3') ? ' has-error' : '' }}">
							<label for="picture3" class="col-md-4 control-label">Foto 3</label>
							<div class="col-md-6">
								<input type="file" id="picture3" name="picture_3" value="lol.png">

								@if ($errors->has('picture_3'))
								<span class="help-block">
									<strong>{{ $errors->first('picture_3') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection