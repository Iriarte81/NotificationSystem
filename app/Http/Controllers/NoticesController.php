<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

use Illuminate\Http\Request;

class NoticesController extends Controller {

	/**
	* Create a new notices controller instance.
	*/


	public function __construct()
	{
		$this->middleware('auth');

		parent::__construct(); //call the constructor of the parent
	}

	/**
	* Show all notices.
	*/


	public function index()
	{
		$notices = $this->user->notices;

		return view('notices.index', compact('notices'));
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

	public function confirm(Requests\PrepareNoticeRequest $request)
	 {

	 	$template = $this->compileDmcaTemplate($data = $request->all());

	 	session()->flash('dmca', $data);

		return view('notices.confirm', compact('template'));

	}

	/**
	*
	* Store a new DMCA notice.
	*/


	public function store(Request $request) 
	{

		$notice = $this->createNotice($request);


		// And then fire off the email
		// we do use Mail at the top of the file to import the Mail class
		\Mail::queue('emails.dmca', compact('notice'), function($message) use ($notice) {
			$message->from($notice->getOwnerEmail())
				->to($notice->getRecipientEmail())
				->subject('DMCA Notice');
		});


		return redirect('notices');

	
	}


	/**
	*
	* Compile the DMCA template from the form data.
	*
	*/

	public function compileDmcaTemplate($data) {

		$data = $data + [
		'name' => $this->user->name,
		'email' => $this->user->email,
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
		$notice = session()->get('dmca') + ['template' => $request->input('template')];
		$notice = $this->user->notices()->create($notice);

		// Alternatively:
		//$data = session()->get('dmca');
		//$notice = \App\Notice::open($data)->useTemplate($request->input('template'));
		//\Auth::user()->notices()->save($notice);

		return $notice; // notice required to send email
	}



}
