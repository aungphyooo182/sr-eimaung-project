<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Gate;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','view']);
    }

    public function index(){
        $data = Post::orderBy('id','desc')->paginate(5);
        return view('posts/index',["posts" => $data]);
    }

    public function view($id){
        $data1 = Post::find($id);
        return view('posts/view',["post"=>$data1]);
    }

    public function add(){
        $categories=Category::all();
        return view('posts/add',["categories"=>$categories]);
    }

    public function create(){
        $validator= validator(request()->all(),[
            "title"=>"required",
            "body"=>"required",
            "category_id"=>"required"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $post= new Post;
        $post->title=request()->title;
        $post->body=request()->body;
        $post->category_id=request()->category_id;
        $post->user_id=auth()->user()->id;
        $post->save();
        return redirect('/posts');
    }

    public function edit($id){
        $post=Post::find($id);
        if(Gate::allows('edit',$post)){
            $categories=Category::all();
            return view('posts.edit',["post"=>$post],["categories"=>$categories]);
        }else{
            return back()->with('info',"Unauthorized to edit."); 
        }
        
    }

    public function update($id){
        $post=Post::find($id);
        $post->title=request()->title;
        $post->body=request()->body;
        $post->category_id=request()->category_id;
        $post->save();
        return redirect("/posts/view/$id");
    }

    public function delete($id){
        $post=Post::find($id);
        if(Gate::allows('delete',$post)){
        $post->delete();
        return redirect("/posts")->with('info',"$post->title is delete.");
        }else{
            return back()->with('info',"Unauthorized to delete.");  
        }
    }
}
