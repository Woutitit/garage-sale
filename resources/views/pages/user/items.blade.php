@extends('layouts.app')

@section('content')
<div class="container">
@if(Auth::check())
<h1>My Items</h1>
@else
<h1>Items of Wout Borghgraef</h1>
@endif
</div>
@endsection