@extends('app');

@section('content')
	<h1 class="page-heading">Your Recipes</h1>
	
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
			@foreach($recipes as $recipe)
				<tr>
					<td>{{ $recipe->recipe_name }}</td>
					<td>{{ $recipe->category->name }}</td>
					<td>{{ $recipe->created_at->diffForHumans() }}</td>
					<td>
						{!! Form::open() !!}
							<div class="form-group">
								{!! Form::checkbox('recipe_made',$recipe->recipe_made,$recipe->recipe_made)!!}
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
@stop