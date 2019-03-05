<?php

namespace Tests\Unit;

use App\Model\Site;
use App\Service\SiteService;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteServiceTest extends TestCase
{

    private $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new SiteService();

        $site = Site::query()->where("url", "http://test.com")->first();
        if($site) {
            $this->delete_site($site->site_code);
        }
    }

    public function testRegisterMethod()
    {

        $site_name = "test_site";
        $site_url = "http://test.com";
        $password = "123456";

        $site_code = $this->create_site($site_name, $site_url, $password);

        $site_in_db = Site::query()->where("site_code", $site_code)->first();

        $this->assertTrue(strlen($site_code) == 8);

        $this->assertEquals($site_in_db->name, $site_name);
        $this->assertEquals($site_in_db->url, $site_url);
        $this->assertTrue(Hash::check($password, $site_in_db->password));

        $this->delete_site($site_code);


    }

    public function testCheckLoginMethod()
    {

        $site_code = $this->create_site("test", "http://test.com", "123456");

        $result = $this->service->check_login($site_code, "123456");
        $this->assertTrue($result);

        $this->delete_site($site_code);

    }

    private function create_site($site_name, $site_url, $password){
        $site_code = $this->service->register($site_name, $site_url, $password);
        return $site_code;
    }

    private function delete_site($site_code)
    {
        $site_in_db = Site::query()->where("site_code", $site_code)->first();

        if($site_in_db) {
            $site_in_db->forceDelete();
        }
    }
}
