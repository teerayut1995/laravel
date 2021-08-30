<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
    	$query =  Post::with('category');

        $name = '';
        $category_id = '';

    	if (!empty($request->name)) {
            $name = $request->name;
    		$query = $query->where('post_name_th', 'LIKE', '%'.$request->name.'%')
                           ->orWhere('post_name_en', 'LIKE', '%'.$request->name.'%');
    	}

    	if (!empty($request->category)) {
            $category_id = $request->category;
    		$query = $query->where('category_id', $request->category);
    	}

    	$posts = $query->paginate(8)->appends(request()->except('page'));
        $categories = Category::all();

    	return view('post.index', compact('posts', 'categories', 'name', 'category_id'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function show($post_id)
    {
    	$post = Post::where('id', $post_id)->with('category')->first();
        return view('post.show', compact('post'));
    }

    public function store(Request $request) 
    {
    	$messages = [
    		'post_name_th.required' => 'กรุณากรอกชื่อ',
    		'post_name_th.unique' => 'มีชื่อนี้อยู่แล้ว',
    		'category_id.exists' => 'ไม่พบหมวดหมู่'
    	];

    	$validator = Validator::make($request->all(), [
    		'post_name_th' => 'required|unique:posts',
    		'category_id' => 'required|exists:categories,id',
    		'post_image' => 'required|mimes:jpeg,jpg,png'
    	], $messages);

    	if ($validator->fails()) {
    		return $validator->messages();
    	}

    	if ($request->hasFile('post_image')) {
    		$file = $request->file('post_image');
    		$file_name = md5(time()).'.'. $file->getClientOriginalExtension();
    		$file->move(public_path('/images/posts/'), $file_name);
    	} else {
    		$file_name = '';
    	}
    	$post = Post::create([
    		'post_name_th' => $request->post_name_th,
	    	'post_name_en' => $request->post_name_en,
	    	'post_description' => $request->post_description,
	    	'post_image' => $file_name,
	    	'category_id' => $request->category_id
    	]);
    	// return redirect('/posts');
        return $post;
    }

    public function update(Request $request, $post_id)
    {
    	$post = Post::find($post_id);
    	if (!$post) {
    		return 'ไม่พบข้อมูลในการอัพเดต';
    	}
    	
    	if ($request->hasFile('post_image')) {
    		$file = $request->file('post_image');
    		$file_name = md5(time()).'.'. $file->getClientOriginalExtension();
    		$file->move(public_path('/images/posts/'), $file_name);

    		if ($post->post_image) {
    			@unlink(public_path() . '/images/posts/'. $post->post_image);
    		}
    		
    	} else {
    		$file_name = $post->post_image;
    	}

    	$update = Post::where('id', $post_id)
    				->update([
    					'post_name_th' => $request->post_name_th,
				    	'post_name_en' => $request->post_name_en,
				    	'post_description' => $request->post_description,
				    	'post_image' => $file_name,
				    	'category_id' => $request->category_id
    				]);
    	return redirect('/posts');
    }

    public function delete($post_id)
    {
		return $post_id;
    	$post = Post::find($post_id);
    	if (!$post) {
    		return 'ไม่พบข้อมูลในการลบ';
    	}
    	if ($post->post_image) {
    		@unlink(public_path() . '/images/posts/'. $post->post_image);
    	}
    	$post->delete(); 	
    	return redirect('/posts');
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'post_id'));
    }

}
