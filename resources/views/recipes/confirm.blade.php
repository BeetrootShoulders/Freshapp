@extends('app');

@section('content')
	<h1 class="page-heading">Review the recipe before submitting</h1>
	
	{!! Form::open(['action' => 'RecipesController@store']) !!}

		<div class="form-group">
			{!! Form::label('template', 'Recipe:') !!}
			{!! Form::textarea('template', $template, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Submit',['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

	@include('errors.list')
@stop