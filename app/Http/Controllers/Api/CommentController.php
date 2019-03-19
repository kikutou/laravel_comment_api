<?php

namespace App\Http\Controllers\Api;

use App\Service\CommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function add_comment(Request $request)
    {
        $data = $request->json()->all();

        $service = new CommentService();

        if($service->validate_add_comment_request($data)) {
            $comment = $service->add_comment($data["site_code"], $data["password"], $data["topic"], $data["comment"], $data["items"] ?? null);
            if($comment) {
                return $comment;
            } else {
                return response()->json(null, 500);
            }

        } else {
            return response()->json(null, 400);
        }
    }


    public function get_comments(Request $request)
    {
        $data = $request->json()->all();

        $service = new CommentService();

        if($service->validate_get_comment_request($data)) {
            $comments = $service->get_comments($data["site_code"], $data["password"], $data["topic_code"], $data["user_code"] ?? null);
            if($comments) {
                return $comments;
            } else {
                return response()->json(null, 500);
            }

        } else {
            return response()->json(null, 400);
        }
    }
}
