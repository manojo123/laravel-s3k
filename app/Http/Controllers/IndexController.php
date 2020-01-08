<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function index(){
		return view('home');
	}

	public function show($test){
		dd($test);
	}
}
