@extends('app')

@section('content')

	<h1 class="page-heading">Create a Recipe</h1>

	{!! Form::open(['method' => 'GET', 'action' => 'RecipesController@confirm']) !!}
		<div class="form-group">
			{!! Form::label('recipe_name','Recipe Title:') !!}
			{!! Form::text('recipe_name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id','Category:') !!}
			{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ingredients','Ingredients:') !!}
			{!! Form::textarea('ingredients', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('method','Method:') !!}
			{!! Form::textarea('method', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Preview recipe',['class' => 'btn btn-primary form-controll']) !!}
		</div>

	{!! Form::close() !!}

	@include('errors.list')
@stop