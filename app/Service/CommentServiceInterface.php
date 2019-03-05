<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/05
 * Time: 11:53
 */

namespace App\Service;


interface CommentServiceInterface
{

    public function add_comment($site_code, $password, Array $topic, Array $comment, Array $items);

    public function get_comments($site_code, $password, $topic_code, $user_code = null);

}