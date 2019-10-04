<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Gate;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $comment= new Comment;
        $comment->comment= request()->comment;
        $comment->post_id=request()->post_id;
        $comment->user_id=auth()->user()->id;
        $comment->save();
        return back()->with('info','A comment added.');
    }

    public function delete($id){
        $comment= Comment::find($id);
        if(Gate::allows('delete',$comment)){
            $comment->delete();
        return back()->with('info','A comment deleted.');
        }else{
            return back()->with('info','Unauthorize to delete.');
        }
        
    }
}
