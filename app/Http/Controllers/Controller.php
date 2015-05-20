<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	/**
	*
	* The authenticated user
	*/
	protected $user;

	/**
	*
	* is the user signed in?
	*/
	

	protected $signedIn;

	/**
	*
	* Create a new controller instance
	*/
	
	public function __construct()
	{
		$this->user = $this->signedIn = Auth::user();
	}


	/**
	*
	*
	*/


}
