<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Category;
use App\Recipe;

class RecipesController extends Controller {

	public function  __construct()
	{
		$this->middleware('auth'); // enable authorisation middleware (ie logins)
	}

	public function index()
	{
		$recipes = \Auth::user()->recipes()->latest()->get(); // show all recipes for the logged in user

		return view('recipes.index', compact('recipes'));
	}

	public function create()
	{
		$categories = Category::lists('name','id'); // build an array designed for easy output as a dropdown
		// load a view to create a new recipe
		return view ('recipes.create', compact('categories')); // load the create recipe view, passing in the dropdown array
	}

	public function confirm(Requests\PrepareRecipeRequest $request)
	{
		$data = $request->all() + [ // grab all the data in the GET request and append...
			'name' => \Auth::user()->name // the name from the currently logged in user
		];
		$template  = view()->file(app_path('Http/Templates/recipe.blade.php'), $data); // fill the template from the path with the data

		session()->flash('recipe', $data); // temporarily add the data to a session so it can be grabbed by our Store method

		return view('recipes.confirm', compact('template')); // return the view
	
	}

	public function store(Request $request) // store the data in the database (this method called from the confirm form)
	{
		$recipe = $this->createRecipe($request); // call the createRecipe method below...

		Mail::queue('emails.recipe', compact('recipe'), function($message) use ($recipe) { //queue up a new e-mail using the template in views/emails called recipe, pass it the recipe var, then..
			$message->from($recipe->getOwnerEmail()) // set from
					->to(env('TEST_EMAIL')) // set to
					->subject('New recipe!'); // set subject
		});


		return redirect('recipes'); // redirect to 'recipes' which calls the index method above

		
	}

	private function createRecipe(Request $request)
	{
		$recipe = session()->get('recipe') + ['template' => $request->input('template')]; // get information from the session create in the confirm method, append template.

		$recipe = \Auth::user()->recipes()->create($recipe); // save the recipe using the logged in user's id

		return $recipe; //return it
	}

	public function show($id)
	{
		
		$recipe = Recipe::find($id);

		return view('recipes.show',compact('recipe'));
	
	}

	public function destroy($id)
	{

		$recipe = Recipe::find($id); // make an new instance of the recipe to be deleted

		$recipe->delete(); // delete it

		return redirect('recipes'); // redirect back to the recipes list

	}
}

