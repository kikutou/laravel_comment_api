<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    protected $table = "items";

    use SoftDeletes;

    public function site()
    {
        return $this->belongsTo(Site::class, "site_id");
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, "item_id");
    }

    public static function add_item(Site $site, Array $item_info) {

        if(isset($item_info["item_code"]) && $item_info["item_code"]) {
            $item_code = $item_info["item_code"];

            $item = Item::query()->where("item_code", $item_code)->first();
            if(!$item) {
                $item = new Item;
                $item->item_code = $item_code;
            }

            $item->title = isset($item_info["title"]) ? $item_info["title"] : null;
        } elseif(isset($item_info["title"]) && $item_info["title"]) {
            $title = $item_info["title"];

            $item = Item::query()->where("title", $title)->first();
            if(!$item) {
                $item = new Item;
                $item->title = $title;
            }

            $item->item_code = isset($item_info["item_code"]) ? $item_info["item_code"] : null;
        }


        $item->site_id = $site->id;

        if(isset($item_info["min"]) && is_integer($item_info["min"])) {
            $item->min = $item_info["min"];
        } else {
            $item->min = 1;
        }

        if(isset($item_info["max"]) && is_integer($item_info["max"])) {
            $item->max = $item_info["max"];
        } else {
            $item->max = 5;
        }

        $item->save();
        return $item;

    }
}
