<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('created_at', 'DESC')->get();
		return view('categories.index', compact('categories'));
    }

    public function show($category_id)
    {
    	$category = Category::where('id', $category_id)
    					->where('category_status', 'active')
    					->with('posts')
    					->first();
		return view('home.category', compact('category'));
    }

    public function store(Request $request)
    {
		
    	$messages = [
    		'category_name_th.required' => 'กรุณากรอกชื่อ',
    		'category_name_th.unique' => 'มีชื่อนี้อยู่แล้ว',
    	];

    	$validator = Validator::make($request->all(), [
    		'category_name_th' => 'required|unique:categories'
    	], $messages);

    	if ($validator->fails()) {
    		return $validator->messages();
    	}

		if ($request->category_status) {
			$request->category_status = 'active';
		} else {
			$request->category_status = 'inactive';
		}
    	$category = Category::create([
    		'category_name_th' => $request->category_name_th,
	    	'category_name_en' => $request->category_name_en,
	    	'category_status' => $request->category_status
    	]);
    	return back();
    }

    public function update(Request $request, $category_id)
    {
    	$category = Category::find($category_id);
    	if (!$category) {
    		return 'ไม่สามารถอัพเดตข้อมูลได้';
    	}
		if ($request->category_status) {
			$request->category_status = 'active';
		} else {
			$request->category_status = 'inactive';
		}
    	$update = Category::where('id', $category_id)
    		->update([
    			'category_name_th' => $request->category_name_th,
		    	'category_name_en' => $request->category_name_en,
		    	'category_status' => $request->category_status
    		]);
    	return back();
    }

    public function delete($category_id)
    {
    	$category = Category::find($category_id);
    	if (!$category) {
    		return 'ไม่พบข้อมูลที่ต้องการลบ';
    	}
    	$category->delete();
    	return back();
    }

}
