<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Category;

class BlogController extends Controller
{

	protected $limit = 3;

    public function index(){
    	$posts = Post::with('author')->latestFirst()->published()->simplepaginate($this->limit);
    	$categories = Category::with(['posts'=>function($query){
    		$query->published();
    	}])->orderBy('title','asc')->get();

    	return view('blog.index',compact('posts','categories'));
    }

    public function show(Post $post){
		$categories = Category::with(['posts'=>function($query){
    		$query->published();
    	}])->orderBy('title','asc')->get();

    	return view('blog.show',compact('post','categories'));
    }

    public function category(Category $category){
    	$posts = Post::with('author')
    		->latestFirst()
    		->published()
    		->where('category_id',$category->id)
    		->simplepaginate($this->limit);

    	$categories = Category::with(['posts'=>function($query){
    		$query->published();
    	}])->orderBy('title','asc')->get();
    	
    	return view('blog.index',compact('posts','categories'));
    }



}
