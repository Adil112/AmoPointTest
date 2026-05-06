<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CommentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $comments = Comment::query()->latest()->paginate(10);
        return CommentResource::collection($comments);
    }
}
