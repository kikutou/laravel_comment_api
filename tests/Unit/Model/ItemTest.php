<?php

namespace Tests\Unit\Model;

use App\Model\Item;
use App\Model\Site;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{

    private $item_infos = array(
        array(
            "item_code" => "aaaaaaa",
            "title" => "test item title",
        ),
        array(
            "item_code" => "aaaaaaa",
        ),
        array(
            "title" => "test item title",
        ),
        array(
            "item_code" => "aaaaaaa",
            "min" => 2,
            "max" => 8,
        )
    );

    private $expects = array(
        array(
            "item_code" => "aaaaaaa",
            "title" => "test item title",
            "min" => 1,
            "max" => 5
        ),
        array(
            "item_code" => "aaaaaaa",
            "title" => null,
            "min" => 1,
            "max" => 5
        ),
        array(
            "item_code" => null,
            "title" => "test item title",
            "min" => 1,
            "max" => 5
        ),
        array(
            "item_code" => "aaaaaaa",
            "title" => null,
            "min" => 2,
            "max" => 8
        ),
    );

    public function testAddItemMethod()
    {

        for($i = 0; $i < count($this->item_infos); $i++) {
            $item_info = $this->item_infos[$i];
            $expect = $this->expects[$i];

            $site = new Site();
            $site->name = "test";
            $site->url = "http://test.com";
            $site->set_password("123456");
            $site->set_site_code();
            $site->save();

            $item = Item::add_item($site, $item_info);

            $this->assertTrue($item instanceof Item);

            $this->assertEquals($item->site_id, $site->id);

            $this->assertEquals($item->item_code, $expect["item_code"]);
            $this->assertEquals($item->title, $expect["title"]);
            $this->assertEquals($item->min, $expect["min"]);
            $this->assertEquals($item->max, $expect["max"]);

            $item->forceDelete();
            $site->forceDelete();
        }


    }
}
