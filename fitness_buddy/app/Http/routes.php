<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Meal;
use Illuminate\Http\Request;

Route::get('/', function () {
	$meals = Meal::orderBy('created_at', 'asc')->get();



   	return view('meals.index', [
   			'meals' => $meals,
   	]) ;
});

Route::post('/meal', function (Request $request) {
	$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
		]);
	if ($validator->fails()){
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	$meal = new Meal;
	$meal->name = $request->name;
	$meal->save();
	
	return redirect('/');
});

Route::delete('/meal/{meal}', function (Meal $meal) {
    //
   $meal->delete();
   return redirect('/');
});


