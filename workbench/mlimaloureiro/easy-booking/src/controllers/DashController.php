<?php namespace Mlimaloureiro\EasyBooking;

class DashController extends BaseController {

	public function __construct() 
	{

	}

	public function index() 
	{
		return View::make('easy-booking::layout');
	}

}