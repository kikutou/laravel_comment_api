<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/05
 * Time: 11:25
 */

namespace App\Service;


interface SiteServiceInterface
{

    public function register($site_name, $site_url, $password);

}