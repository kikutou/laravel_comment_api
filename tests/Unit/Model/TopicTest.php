<?php

namespace Tests\Unit\Model;

use App\Model\Site;
use App\Model\Topic;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopicTest extends TestCase
{
    public function testAddTopicMethod()
    {
        $site = new Site();
        $site->name = "test";
        $site->url = "http://test.com";
        $site->set_password("123456");
        $site->set_site_code();
        $site->save();

        $topic_info = array(
            "topic_code" => "aaaaa",
            "memo" => "this is a test topic"
        );

        $topic = Topic::add_topic($site, $topic_info);

        $this->assertTrue($topic instanceof Topic);
        $this->assertEquals($topic->topic_code, $topic_info["topic_code"]);
        $this->assertEquals($topic->memo, $topic_info["memo"]);
        $this->assertEquals($topic->site_id, $site->id);

        $topic->forceDelete();
        $site->forceDelete();
    }
}
