@extends('app')

@section('content')
	<h1 class="page-heading">Your Recipes</h1>
	<h2>To be made</h2>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Recipe Name</th>
			<th>Category</th>
			<th>Recipe created</th>
			<th>Recipe made?</th>
			<th>View</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($recipes->where('recipe_made', 0, false) as $recipe)
				<tr>
					<td>{{ $recipe->recipe_name }}</td>
					<td>{{ $recipe->category->name }}</td>
					<td>{{ $recipe->created_at->diffForHumans() }}</td>
					<td>
						{!! Form::open(['data-remote','method' => 'PATCH', 'url' => 'recipes/' . $recipe->id]) !!}
							<div class="form-group">
								{!! Form::checkbox('recipe_made',$recipe->recipe_made,$recipe->recipe_made)!!}
								{!! Form::submit('Submit') !!}
							</div>
						{!! Form::close() !!}
					</td>
					<td><a href="{{ url('/recipes', $recipe->id) }}" class="btn btn-success">View</a></td>
					<td>
						{!! Form::open(['route' => ['recipes.destroy',$recipe->id], 'method'=>'delete']) !!}
						{!! Form::Submit('Delete',['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<h2>You have made</h2>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Recipe Name</th>
			<th>Category</th>
			<th>Recipe created</th>
			<th>Recipe made?</th>
			<th>View</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($recipes->where('recipe_made', 1, false) as $recipe)
				<tr>
					<td>{{ $recipe->recipe_name }}</td>
					<td>{{ $recipe->category->name }}</td>
					<td>{{ $recipe->created_at->diffForHumans() }}</td>
					<td>
						{!! Form::open(['data-remote', 'method' => 'PATCH', 'url' => 'recipes/' . $recipe->id]) !!}
							<div class="form-group">
								{!! Form::checkbox('recipe_made',$recipe->recipe_made,$recipe->recipe_made)!!}
								{!! Form::submit('Submit') !!}
							</div>
						{!! Form::close() !!}
					</td>
					<td><a href="{{ url('/recipes', $recipe->id) }}" class="btn btn-success">View</a></td>
					<td>
						{!! Form::open(['route' => ['recipes.destroy',$recipe->id], 'method'=>'delete']) !!}
						{!! Form::Submit('Delete',['class' => 'btn btn-danger']) !!}
						{!! Form::token()!!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	@unless(count($recipes))
		<p class="text-center">You have no recipes...yet</p>
	@endunless
@stop