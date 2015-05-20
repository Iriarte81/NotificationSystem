<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	/**
	*
	* Fillable fields for a new notice
	*/


	protected $fillable = [
	'infringing_title',
	'infringing_link',
	'original_link',
	'original_description',
	'template',
	'content_removed',
	'provider_id',
	];

	/**
	*
	* Open a new notice
	*/


	public static function open(array $attributes)
	{
		return new static($attributes);

	}

	/**
	*
	* Set the email template for the notice.
	*/


	public function useTemplate($template)
	{
		$this->template = $template;

		return $this;
	}

	/**
	*
	* A notice belongs to a recipient/provider.
	*/


	public function recipient()
	{
		return $this->belongsTo('App\Provider', 'provider_id');
	}

	/**
	*
	* A notice is created by a user
	*/

	public function user()
	{
		return $this->belongsTo('App\User');
	}



	/*
	*
	* Get the email address for the recipient of the DMCA
	*/


	public function getRecipientEmail()
	{

		return $this->recipient->copyright_email;

	}

	/**
	*
	* Get the email address of owner of the notice
	*/ 

	public function getOwnerEmail()
	{
		return $this->user->email;
	}

}
