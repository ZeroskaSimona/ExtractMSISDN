<?php

class Msisdn_Controller extends Controller{
	
	public $restful = true;
	
	public function get_Index(){
		 return View::make('extract');
	}
}