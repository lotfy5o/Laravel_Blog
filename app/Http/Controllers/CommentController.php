<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentReq;

class CommentController extends Controller
{
    public function store(StoreCommentReq $request)
    {

        $data = $request->validated();
        Comment::create($data);
        return back()->with('CommentCreateStatus', 'Your Comment Created Successfully');
    }
}
