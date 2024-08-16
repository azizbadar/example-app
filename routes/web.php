<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Events\OPtionSelected;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/option', function (Request $request) {
    $option = $request->input('option');
    broadcast(new OptionSelected($option));
    return response()->json(['status' => 'success']);
});
