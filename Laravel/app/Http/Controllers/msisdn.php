<?php

class Msisdn_Controller extends Controller{
	
	public $restful = true;
	
	public function get_Index(){
		 
		 return View::make('extract');
		 /*->with(compact('name'));*/
		/*return View::make('msisdn.index')->with('title','Extract MSISDN');*/
		/*$view = View::make('index');
		$view['ndc']='71';
		$view->cc='389';
		$view->sn='278784';
		return $view;*/
	}
}