<?php

namespace Tests\Unit;

use App\Model\Comment;
use App\Model\Grade;
use App\Model\Item;
use App\Model\Site;
use App\Model\Topic;
use App\Service\CommentService;
use App\Service\SiteService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentServiceTest extends TestCase
{
    private $comment_service;
    private $site_service;
    public function setUp(): void
    {
        parent::setUp();

        $this->site_service = new SiteService();
        $this->comment_service = new CommentService();



    }


    public function tearDown(): void
    {
        parent::tearDown();

    }

    public function testAddCommentLoginFail()
    {


        $site_in_db = Site::query()->where("url", "http://test.com")->first();
        if($site_in_db) {
            $site_in_db->forceDelete();
        }
        $site_code = $this->site_service->register("test", "http://test.com", "123456");

        $result = $this->comment_service->add_comment($site_code . "test", "654321", array(), array("title" => "comment content"), array());

        $this->assertFalse($result);

        $result = $this->comment_service->add_comment($site_code, "654321", array(), array("title" => "comment content"), array());
        $this->assertFalse($result);

        $site_in_db = Site::query()->where("url", "http://test.com")->first();
        if($site_in_db) {
            $site_in_db->forceDelete();
        }

    }

    public function testAddCommentSuccess()
    {

        $site_in_db = Site::query()->where("url", "http://test.com")->first();
        if($site_in_db) {
            $site_in_db->forceDelete();
        }

        $site_code = $this->site_service->register("test", "http://test.com", "123456");

        $result = $this->comment_service->add_comment(
            $site_code,
            "123456",
            array(
                "topic_code" => "topic_aaa",
                "memo" => "this is test topic"
            ),
            array(
                "title" => "I like this product",
                "content" => "this is product is so good, like it very much.",
                "user_code" => "kiku test"
            ),
            array(
                array(
                    "item_code" => "no1",
                    "title" => "外観",
                    "grade" => 4
                ),
                array(
                    "item_code" => "no2",
                    "title" => "サービス",
                    "grade" => 3
                ),
                array(
                    "item_code" => "no3",
                    "title" => "品質",
                    "grade" => 2
                ),
                array(
                    "item_code" => "no4",
                    "title" => "セキュリティ",
                    "grade" => 1
                )
            )
        );

        $this->assertTrue($result instanceof Comment);
        $this->assertEquals($result->grades->count(), 4);

        foreach ($result->grades as $grade) {
            $grade->forceDelete();
        }

        $items = Item::all();
        if($items->count() > 0) {
            foreach ($items as $item) {
                $item->forceDelete();
            }
        }

        $topic = $result->topic;

        $result->forceDelete();
        $site = $topic->site;

        $topic->forceDelete();
        $site->forceDelete();



    }


    public function testGetComments()
    {
        $site_in_db = Site::query()->where("url", "http://test.com")->first();
        if($site_in_db) {
            $site_in_db->forceDelete();
        }

        $site_code = $this->site_service->register("test", "http://test.com", "123456");

        $result1 = $this->comment_service->add_comment(
            $site_code,
            "123456",
            array(
                "topic_code" => "topic_aaa11111",
                "memo" => "this is test topic11111"
            ),
            array(
                "title" => "I like this product11111",
                "content" => "this is product is so good, like it very much.11111",
                "user_code" => "kiku test11111"
            ),
            array(
                array(
                    "item_code" => "no1",
                    "title" => "外観",
                    "grade" => 1
                ),
                array(
                    "item_code" => "no2",
                    "title" => "サービス",
                    "grade" => 1
                ),
                array(
                    "item_code" => "no3",
                    "title" => "品質",
                    "grade" => 1
                ),
                array(
                    "item_code" => "no4",
                    "title" => "セキュリティ",
                    "grade" => 1
                )
            )
        );


        $result2 = $this->comment_service->add_comment(
            $site_code,
            "123456",
            array(
                "topic_code" => "topic_aaa11111",
                "memo" => "this is test topic22222"
            ),
            array(
                "title" => "I like this product22222",
                "content" => "this is product is so good, like it very much.22222",
                "user_code" => "kiku test22222"
            ),
            array(
                array(
                    "item_code" => "no1",
                    "title" => "外観",
                    "grade" => 2
                ),
                array(
                    "item_code" => "no2",
                    "title" => "サービス",
                    "grade" => 2
                ),
                array(
                    "item_code" => "no3",
                    "title" => "品質",
                    "grade" => 2
                ),
                array(
                    "item_code" => "no4",
                    "title" => "セキュリティ",
                    "grade" => 2
                )
            )
        );


        $result3 = $this->comment_service->add_comment(
            $site_code,
            "123456",
            array(
                "topic_code" => "topic_aaa33333",
                "memo" => "this is test topic33333"
            ),
            array(
                "title" => "I like this product33333",
                "content" => "this is product is so good, like it very much.33333",
                "user_code" => "kiku test33333"
            ),
            array(
                array(
                    "item_code" => "no1",
                    "title" => "外観",
                    "grade" => 3
                ),
                array(
                    "item_code" => "no2",
                    "title" => "サービス",
                    "grade" => 3
                ),
                array(
                    "item_code" => "no3",
                    "title" => "品質",
                    "grade" => 3
                ),
                array(
                    "item_code" => "no4",
                    "title" => "セキュリティ",
                    "grade" => 3
                )
            )
        );



        $site_in_db2 = Site::query()->where("url", "http://test2.com")->first();
        if($site_in_db2) {
            $site_in_db2->forceDelete();
        }

        $site_code2 = $this->site_service->register("test2", "http://test.com2", "654321");

        $result4 = $this->comment_service->add_comment(
            $site_code2,
            "654321",
            array(
                "topic_code" => "topic_aaa44444",
                "memo" => "this is test topic44444"
            ),
            array(
                "title" => "I like this product44444",
                "content" => "this is product is so good, like it very much.44444",
                "user_code" => "kiku test444444"
            ),
            array(
                array(
                    "item_code" => "no1",
                    "title" => "外観",
                    "grade" => 4
                ),
                array(
                    "item_code" => "no2",
                    "title" => "サービス",
                    "grade" => 4
                ),
                array(
                    "item_code" => "no3",
                    "title" => "品質",
                    "grade" => 4
                ),
                array(
                    "item_code" => "no4",
                    "title" => "セキュリティ",
                    "grade" => 4
                )
            )
        );


        $comments = $this->comment_service->get_comments("VEie4FLA", "123456", "topic_aaa11111");

        $this->assertEquals(count($comments), 2);


    }

}
