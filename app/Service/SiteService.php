<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/05
 * Time: 11:27
 */

namespace App\Service;


use App\Model\Site;
use Illuminate\Support\Facades\Hash;

class SiteService implements SiteServiceInterface
{
    public function register($site_name, $site_url, $password)
    {

        $site = new Site;

        $site->name = $site_name;
        $site->url = $site_url;
        $site->set_password($password);
        $site->set_site_code();

        $site->save();

        return $site->site_code;


    }

    public function check_login($site_code, $password) {
        $result = false;

        $site = Site::query()->where("site_code", $site_code)->first();
        if($site) {
            $result = Hash::check($password, $site->password);
            if($result) {
                return $site;
            }
        }

        return $result;

    }
}