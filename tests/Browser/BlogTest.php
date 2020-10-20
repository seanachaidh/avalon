<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BlogTest extends DuskTestCase
{
    
    public function testLogin()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit("/login");
            $browser->type("email", "pvankeymeulen@seanachaidh.be");
            $browser->type("password", "12345");
            $browser->press("login");
            $browser->assertPathIs("/articles/create");
        });
    }
    
    public function testFalselogin()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit("/login");
            $browser->type("email", "pvankeymeulen@seanachaidh.be");
            $browser->type("password", "1234");
            $browser->press("Login!");
            $browser->assertSee("you are forbidden to access this page");
        });
    }
    
}
