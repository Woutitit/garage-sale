@extends('layouts.app')

@section('content')
<div class="container">
@if(Auth::check())
<h1>My Items</h1>
<a href="/items/create" class="btn btn-success">Create item</a>
@else
<h1>Items of Wout Borghgraef</h1>
@endif
</div>
@endsection