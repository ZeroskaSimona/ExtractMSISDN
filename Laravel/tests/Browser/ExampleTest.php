<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Extract MSISDN');
        });
    }
 	
    public function testPhoneNo()
    {
    	$this->browse(function (Browser $browser) {
            $browser->type('phoneNo', '+389 70 123456');
            $browser->pause(5000);
            $res='+389 70 123456';
            $browser->assertInputValue('phoneNo', $res);
            //$tres='+389 70 123456';
            //$val=str_replace(" ","",$tres);
         });  
    }
	
	public function testSubstrPhoneNo()
    {
    	$this->browse(function (Browser $browser) {
            $browser->type('phoneNo', '38970123456');
            $browser->pause(2000);
            $res='+389 70 123456';
            $resS=str_replace("+","",$res);
            $val=str_replace(" ","",$resS);
            $browser->assertInputValue('phoneNo', $val);
                   
         });   	
    	//$browser->assertElementValueEquals('phoneNo', $val);
    }
    
   
}
