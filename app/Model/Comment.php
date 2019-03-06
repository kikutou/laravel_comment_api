<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    public function topic()
    {
        return $this->belongsTo(Topic::class, "topic_id");
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, "comment_id");
    }

    public static function add_comment(Topic $topic, Array $comment_info)
    {

        $comment = new Comment();
        $comment->topic_id = $topic->id;
        $comment->title = $comment_info["title"] ?? null;
        $comment->content = $comment_info["content"] ?? null;
        $comment->user_code = $comment_info["user_code"] ?? null;
        $comment->save();
        return $comment;

    }

}
