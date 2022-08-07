<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;


class CategoryController extends Controller
{
    // public function index()
    // {
        
    //     return view('add-product', compact('category'));
    // }

    public function create()
    {
        return view('category.add-category');
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:191',
        ]);

        
        if($validator->fails()){
            Session::flash('error','Insert Valid Data.');
            Session::save();
            return view('category.add-category');
        }
        else{
            Category::create($request->all());
            Session::flash('success','Categories created successfully.');
            Session::save();
            return view('category.add-category');
        }
    }
}
