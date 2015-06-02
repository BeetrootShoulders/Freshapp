@extends('app')

@section('content')

{!! Form::open(['method' => 'post','action' => 'FormsController@pageThree']) !!}
	@for($i = 0; $i < 2; $i++)
	<div class="form-group">
			{!! Form::label('email[]','E-mail:') !!}
			{!! Form::email('email[]', null, ['class' => 'form-control']) !!}
	</div>
	@endfor
	<div class="form-group">
		{!! Form::submit('Next',['class' => 'btn btn-success form-control'])!!}
	</div>
{!! Form::close() !!}

@stop