<?php

namespace App\Http\Controllers\Api;

use App\Service\SiteService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->json()->all();

        $service = new SiteService();

        if($service->validate_register_data($data)) {

            $site_code = $service->register($data["site_name"], $data["site_url"], $data["password"]);
            if($site_code) {
                return array(
                    "site_code" => $site_code
                );
            } else {
                return response()->json(null, 500);
            }
        } else {
            return response()->json(null, 400);
        }


    }
}
