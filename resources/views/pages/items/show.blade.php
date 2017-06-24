@extends('layouts.app')

@section('content')
<div class="container">
	<div class="Row">
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('uploads/items/1498267957-beef-7795x5725-steak-food-cooking-grill-vegetables-meal-meat-tomato-408.jpg') }}">
		</div>
		<div class="col-md-8">
			<h1 class="item-title">Beachball limited size</h1>
			<div class="item-user-name">Wout Borghgraef</div>
			<small class="item-user-locality">Tienen</small>
			<h3 class="item-price">€20.00</h3>
			<button class="btn btn-primary">Buy</button>
			<button class="btn btn-default">Message owner</button>
		</div>
	</div>
</div>
<div class="container">
<div class="col-md-12">
	<h2>More information</h2>
	<p>This beachball hasn't been used as much as it used to.</p>
	</div>
</div>
@endsection