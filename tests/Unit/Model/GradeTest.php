<?php

namespace Tests\Unit\Model;

use App\Model\Comment;
use App\Model\Grade;
use App\Model\Item;
use App\Model\Site;
use App\Model\Topic;
use App\Service\SiteService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Unit\SiteServiceTest;

class GradeTest extends TestCase
{

    private $site_service;

    public function setUp(): void
    {
        parent::setUp();
        $this->site_service = new SiteService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddGrade()
    {

        $site_in_db = Site::query()->where("url", "http://test.com")->first();
        if($site_in_db) {
            $site_in_db->forceDelete();
        }
        $site_code = $this->site_service->register("test", "http://test.com", "123456");

        $site_service = new SiteService();
        $site = $site_service->check_login($site_code, "123456");

        $topic = Topic::add_topic($site, array(
            "topic_code" => "aaa",

        ));

        $comment = Comment::add_comment($topic, array(
            "user_code" => "kiku test",
            "title" => "comment title",
            "content" => "comment content"
        ));

        $item_info = array(
            "item_code" => "no1",
            "title" => "外観"
        );

        $item = Item::add_item($site, $item_info);

        $grade = Grade::add_grade($item, $comment, 3);

        $this->assertTrue($grade instanceof Grade);

        $grade->forceDelete();
        $item->forceDelete();
        $comment->forceDelete();
        $topic->forceDelete();
        $site->forceDelete();
    }
}
