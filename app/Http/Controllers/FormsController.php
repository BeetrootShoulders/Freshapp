<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FormsController extends Controller {

	public function pageOne()
	{
		session()->flash('form','start');
		return view('forms.pageOne');
	
	}

	public function pageTwo(Request $request)
	{
		
		$data = $request->all();

		session()->put('stepOne', $data);

		return view('forms.pageTwo');
	
	}

	public function pageThree(Request $request)
	{
		
		$data = $request->all();
		$sessionData = session()->get('stepOne');

		$summary = $data + $sessionData;

		return $summary;
	
	}

}
