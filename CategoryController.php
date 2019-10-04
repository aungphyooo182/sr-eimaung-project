<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    
    public function all()
    {
        return Category::all();
    }

    public function get($id)
    {
        return Category::find($id);
    }

    public function add()
    {
        $category = new Category;
        $category->name = request()->name;
        $category->save();
        return $category;
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $category->name = request()->name;
        $category->save();
        return $category;
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $category;
    }
}
