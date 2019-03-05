<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Site extends Model
{
    protected $table = "sites";


    public function set_password($password)
    {
        $this->password = Hash::make($password);
    }

    public function set_site_code()
    {
        $site_code = Str::random(8);

        while (Site::query()->where("site_code", $site_code)->first()) {
            $site_code = Str::random(8);
        }

        $this->site_code = $site_code;
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, "site_id");
    }

    public function items()
    {
        return $this->hasMany(Item::class, "site_id");
    }
}
