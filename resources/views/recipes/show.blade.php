@extends('app')

@section('content')
	<h1 class="page-header">{{ $recipe->recipe_name }}</h1>
	<h2>Ingredients</h2>
	<p>{{ $recipe->ingredients }}</p>
	<h2>Method</h2>
	<p>{{ $recipe->method }}</p>
	<small>Created by: {{ $recipe->user->name }}</small>
@stop