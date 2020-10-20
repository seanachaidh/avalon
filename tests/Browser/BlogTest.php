<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BlogTest extends DuskTestCase
{
    use DatabaseTransactions;
    
    public function testLogin()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit("/login");
            $browser->type("email", "pieter@pieter.com");
            $browser->type("password", "12345");
            $browser->press("Login!");
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
    
    public function testCreation()
    {
        $this->browse(function(Browser $browser) {
            /*
            $browser->visit("/login");
            $browser->type("email", "pieter@pieter.com");
            $browser->type("password", "1234");
            $browser->press("Login!");
            */
            $browser->visit("/articles/create");
            $browser->type("title", "testing post");
            $browser->type("synopsis", "A testing post");
            $browser->type("contents", "Dusk test testingmessage");
            $browser->press("Maken!");
            
            $browser->assertPathIs("/articles");
            $browser->assertSee("Dusk test testingmessage");
        });
    }
    
    public function testComment()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit("/articles");
            $browser->press("commentaar");
            $browser->pause(5000);
            $browser->assertAttribute("#mymodal-1", "class", "modal fade show");
            $browser->press("Sluiten");
            $browser->pause(5000);
            $browser->assertAttribute("#mymodal-1", "class", "modal fade");
        });
    }
}
