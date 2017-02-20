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
            $browser->type('phoneNo', '38970123456');
        });   	
    	//$browser->assertElementValueEquals('phoneNo', $val);
    }
    
public function testPause()
    {
    	$this->browse(function (Browser $browser) {
            $browser->pause(6000);
            $res='3897012345';
            $browser->assertInputValue('phoneNo', $res);
        });   	
    }
    
    
}
