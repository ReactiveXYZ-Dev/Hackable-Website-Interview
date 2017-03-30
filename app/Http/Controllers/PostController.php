<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function myPosts(Request $request)
    {
    	return view('posts.my')->with([
    			'posts' => $request->user()->posts
    		]);
        
    }

    public function showPost(Request $request, Post $post)
    {   

        if ($request->user()->posts()->find($post->id)) {

            return view('posts.show')->with([
                'post' => $post
            ]);

        } 

        abort(403);
    	
    }

    public function showPostComposer(Request $request)
    {
    	return view('posts.create');
    }

    public function createPost(Request $request)
    {
   
       	// Validation
       	// Warning: The trick is happening here, 
    	// we are allowing SVG, thus XSS can happen
    	$this->validate($request, [
    		'title' => 'required',
    		'content' => 'required',
            'cover-image' => 'mimes:jpeg,jpg,png,bmp,gif,svg'
        ]);

        // if validation successes
        // create post
        $post = $request->user()->posts()->create([
                'title' => $request->title,
                'content' => $request->content
            ]);
        // save image
        $path = $request->file('cover-image')->store('images');
        $post->cover_image_url = $path;
        // save post
        $success = $post->save();
    	
    	$result = [];
    	if ($success) {
    		$result = [
    			'status' => "success",
    			'message' => "创建成功！看看结果吧~"
    		];
    	} else {
    		$result = [
    			'status' => "error",
    			'message' => "创建失败服务器错误！"
    		];
    	}

    	return response()->json($result);

    }
}
