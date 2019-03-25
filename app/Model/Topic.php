<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Topic extends Model
{
    protected $table = "topics";

    use SoftDeletes;

    public function site()
    {
        return $this->belongsTo(Site::class, "site_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "topic_id");
    }

    public static function add_topic(Site $site, Array $topic_info) {

        $topic_code = $topic_info["topic_code"];

        $topic = Topic::query()->where("topic_code", $topic_code)->first();
        if(!$topic) {
            $topic = new Topic();
            $topic->topic_code = $topic_code;
        }

        $topic->site_id = $site->id;
        $topic->memo = isset($topic_info["memo"]) ? $topic_info["memo"] : null;

        $topic->save();

        return $topic;

    }
}
