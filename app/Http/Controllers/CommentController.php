<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // for gate method


class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }

    public function delete($id) {
        $comment = Comment::find($id);

        // if($comment->user_id == auth()->user()->id) {
        //     $comment->delete();
        //     return back();
        // } else {
        //     return back()->with('error', 'Unauthorize');
        // }

        if(Gate::allows('comment-delete', $comment)) {
            $comment->delete();
            return back();
        } else {
            return back()->with('error', 'Unauthorize');
        }

        // if(Gate::denies('comment-delete', $comment)) {
        //     return back()->with('error', 'Unauthorize');
        // } else {
        //     $comment->delete();
        //     return back();
        // }
    }
}
