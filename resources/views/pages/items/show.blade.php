@extends('layouts.app')

@section('content')
<div class="container">
	<div class="Row">
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('uploads/items/1498267957-beef-7795x5725-steak-food-cooking-grill-vegetables-meal-meat-tomato-408.jpg') }}">
		</div>
		<div class="col-md-8">
			<h1 class="item-title">{{ $itemDetails->item_name }}</h1>
			<div class="item-user-name">{{ $itemDetails->user_name }}</div>
			<small class="item-user-locality">Tienen</small>
			<h3 class="item-price">€{{ $itemDetails->price }}</h3>
			@if ($itemDetails->user_id === Auth::id())
			<a href="{{ '/items/' . $itemDetails->item_id . '/edit '}}" class="btn btn-primary">Edit</a>
			<a href="{{ '/items/' . $itemDetails->item_id . '/edit '}}" class="btn btn-danger">Delete</a>
			@else
			<button class="btn btn-primary">Buy</button>
			<button class="btn btn-default">Message owner</button>
			@endif
		</div>
	</div>
</div>
<div class="container">
	<div class="col-md-12">
		<h2>More information</h2>
		<p>{{ $itemDetails->description }}</p>
	</div>
</div>
@endsection