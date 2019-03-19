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
        "side_name" => "required",
        "url" => "required",
      ];
      $validator_messages = [
        "side_name.required" => "名前を入力してください。",
        "url.required" => "urlを入力してください。",
      ];
      $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
      if($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator);
      }
      $site = new Site;
      $site->name = $request->side_name;
      $site->url = $request->url;
      $site->save();
      $message = '新規作成が完了となりました。';
      return redirect()->back()->with(["message" => $message]);
    }

  }


  public function delete(Request $request)
    {
      if($request->isMethod("POST")) {
        $site = Site::find($request->site_id);
        if($site){
          $site->delete();
        }
        return redirect(route("get_show_sites"));
      }
    }

  public function edit(Request $request){
    return view('api.site.edit');
  }


}
