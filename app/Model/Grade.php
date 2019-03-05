<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Grade extends Model
{
    protected $table = "grades";

    public function comment()
    {
        return $this->belongsTo(Comment::class, "comment_id");
    }

    public function item()
    {
        return $this->belongsTo(Item::class, "item_id");
    }

    public static function add_grade(Item $item, Comment $comment, $grade_num)
    {
        $grade = new Grade();
        $grade->item_id = $item->id;
        $grade->grade = $grade_num;
        $grade->comment_id = $comment->id;
        $grade->save();

        return $grade;
    }
}
