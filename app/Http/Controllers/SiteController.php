<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Site;
use Validator;

class SiteController extends Controller
{
  public function index(Request $request){
    $sites = Site::all();
    return view("api.site.index", ["sites" => $sites]);
    }

  public function show_add_site(Request $request){
    return view('api.site.add');
  }


  public function add(Request $request){
    if($request->isMethod("POST")){
      $validator_rules = [
        "name" => "required",
        "password" => "required",
        "url" => "required",
        "site_code" => "required",
      ];
      $validator_messages = [
        "name.required" => "名前を入力してください。",
        "password.required" =>"パスワードを入力してください。",
        "url.required" => "urlを入力してください。",
        "site_code.required" =>"site_codeを入力してください。"
      ];
      $validator=Site::make($request->all(),$validator_rules,$validator_messages);
      if($validator->fails()){
        return redirect(route("get_show_add_sites"))->withInput()->withErrors($validator);
      }
      $site = new Site;
      $site->name = $request->name;
      $site->url = $request->url;
      $site->password = $request->password;
      $site->site_code = $request->site_code;
      $site->save();
      return redirect(route("api.site.index"));
    }
  }
}
