@extends('layouts.app')

@section('content')
<div class="container">
@if(Auth::check())
<h1>My Items</h1>
<a href="#" class="btn btn-success">Add item</a>
@else
<h1>Items of Wout Borghgraef</h1>
@endif
</div>
@endsection