@extends('app')

@section('content')

{!! Form::open(['method' => 'POST','action' => 'FormsController@pageTwo']) !!}
	<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Next',['class' => 'btn btn-success form-control'])!!}
	</div>
{!! Form::close() !!}

@stop