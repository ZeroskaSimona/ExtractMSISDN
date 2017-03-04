<?php
use GuzzleHttp\Client; 

class Msisdn_Controller extends Controller{
	
	public $restful = true;
	
	public function get_Index(){
		 return View::make('extract');
	}
	
	//$this->client->request('GET', 'posts');
	
	/*public function saveApiData()
    {
        $client = new Client();
        $res = $client->request('POST', 'https://https://restcountries.eu/rest/v1/callingcode/389', [
            'form_params' => [
                'ccR' => '389'
            ]
        ]);

        $result= $res->getBody();
        dd($result);
	}*/
}