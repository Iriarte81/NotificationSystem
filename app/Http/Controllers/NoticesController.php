<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NoticesController extends Controller {

	/**
	* Create a new notices controller instance.
	*/


	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	* Show all notices.
	*/


	public function index()
	{
		return \Auth::user()->notices;
	}

	/**
	* Show a page to create a new notice
	*/

	public function create()
	{
		// get list of providers
		$providers = \App\Provider::lists('name', 'id');

		//load a view to create a new notices
		return view('notices.create', compact('providers'));
	}

	/**
	* Confirm Notice Selections
	* The logic of this method will only fire if the
	* validation rules of $request pass
	*
	* Ask the user to confirm the DMCA that will be delivered
	*
	*/

	public function confirm(Requests\PrepareNoticeRequest $request, \Illuminate\Contracts\Auth\Guard $auth)
	 {

	 	$template = $this->compileDmcaTemplate($data = $request->all(), $auth);

	 	session()->flash('dmca', $data);

		return view('notices.confirm', compact('template'));

	}

	/**
	*
	* Store a new DMCA notice.
	*/


	public function store(Request $request) 
	{

		$this->createNotice($request);

		return redirect('notices');

		// And then fire off the email

	}


	/**
	*
	* Compile the DMCA template from the form data.
	*
	*/

	public function compileDmcaTemplate($data, \Illuminate\Contracts\Auth\Guard $auth) {

		$data = $data + [
		'name' => $auth->user()->name,
		'email' => $auth->user()->email,
		];

		return view()->file(app_path('Http/Templates/dmca.blade.php'), $data);



	}

	/**
	*
	* Create and persist a new DMCA notice.
	*/


	private function createNotice(Request $request)
	{

		// Form data is flashed, get with session()->get('dmca')
		$data = session()->get('dmca');

		$notice = \App\Notice::open($data)->useTemplate($request->input('template'));
		
		\Auth::user()->notices()->save($notice);

	}



}
