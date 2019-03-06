<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/05
 * Time: 11:55
 */

namespace App\Service;


use App\Model\Comment;
use App\Model\Grade;
use App\Model\Item;
use App\Model\Topic;

class CommentService implements CommentServiceInterface
{
    public function add_comment($site_code, $password, Array $topic, Array $comment, Array $items)
    {

        $site_service = new SiteService();
        $site = $site_service->check_login($site_code, $password);
        if(!$site) {
            return false;
        }


        $topic = Topic::add_topic($site, $topic);

        $comment = Comment::add_comment($topic, $comment);

        foreach ($items as $item_info) {
            $item = Item::add_item($site, $item_info);

            $grade = Grade::add_grade($item, $comment, $item_info["grade"]);

        }

        return $comment;

    }

    public function validate_add_comment_request(Array $data)
    {
        // site_codeとpasswordが必須
        if(
            !isset($data["site_code"])
            || !isset($data["password"])
        ) {
            return false;
        }



        // topicが必須
        if(
            !isset($data["topic"])
            || !is_array($data["topic"])
        ) {
            return false;
        }

        // topicの中のtopic_codeが必須
        if(!isset($data["topic"]["topic_code"])) {
            return false;
        }



        // commentが必須（何も情報がなければ、少なくても、空の配列である必要がある）
        if(
            !isset($data["comment"])
            || !is_array($data["comment"])
        ) {
            return false;
        }



        // itemsが必須
        if(
            !isset($data["items"])
            || !is_array($data["items"])
        ) {
            return false;
        }

        // 各itemをチェックする。
        foreach ($data["items"] as $item) {
            if(!is_array($item)) {
                return false;
            }

            // itemsのitem_codeとtitle少なくても１つが必須
            if(
                !isset($item["item_code"])
                && !!isset($item["title"])
            ) {
                return false;
            }

            if(!isset($item["grade"])) {
                return false;
            }


        }

        return true;
    }

    public function get_comments($site_code, $password, $topic_code, $user_code = null)
    {
        $site_service = new SiteService();
        $site = $site_service->check_login($site_code, $password);
        if(!$site) {
            return array();
        }

        $topic = Topic::query()->where("site_id", $site->id)->where("topic_code", $topic_code)->first();
        if(!$topic) {
            return array();
        }

        $comments = Comment::query()->where("topic_id", $topic->id);

        if($user_code) {
            $comments->where("user_code", $user_code);
        }

        $comments = $comments->get();

        if($comments->count() == 0) {
            return array();
        }

        $result = array();

        foreach ($comments as $comment) {
            $one_comment = array();

            $one_comment["items"] = array();



            foreach ($comment->grades as $grade) {
                $one_item = array();
                $one_item["item_code"] = $grade->item->item_code;
                $one_item["title"] = $grade->item->title;
                $one_item["grade"] = $grade->grade;

                $one_comment["items"][] = $one_item;
            }

            $one_comment["user_code"] = $comment->user_code;
            $one_comment["title"] = $comment->title;
            $one_comment["content"] = $comment->content;

            $result[] = $one_comment;
        }

        return $result;

    }

    public function validate_get_comment_request(Array $data)
    {
        // site_code, password, topic_codeが必須
        if(
            !isset($data["site_code"])
            || !isset($data["password"])
            || !isset($data["topic_code"])
        ) {
            return false;
        }

        return true;

    }

}