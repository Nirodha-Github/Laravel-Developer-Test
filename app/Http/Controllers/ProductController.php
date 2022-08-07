<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('dashboard', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $category = Category::all();
        Session::put('category',$category);
        Session::save();

        return view('products.add-product');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required|max:191',
            'price'=>'required|max:20',
        ]);

        if($validator->fails()){
            Session::flash('error','Enter Valid Data');
            Session::save();
            return view('products.add-product');
        }
        else{
            Product::create($request->all());
            Session::flash('success','Products created successfully.');
            Session::save();
            return view('products.add-product');
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        $category_id = Product::where('id',$id)->value('category_id');
        $category_name =Category::where('id',$category_id)->value('name');

        return view('products.show-product')->with(compact('product','category_name'));
      
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category_id = Product::where('id',$id)->pluck('category_id')->first();
        $category_name = Category::where('id',$category_id)->pluck('name')->first();
        $category = Category::all();
        return view('products.edit-product')->with(compact('product','category','category_name','category_id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'category_id'=>'required',
            'name'=>'required|max:191',
            'price'=>'required|max:20',
        ]);

        if($validator->fails()){
            Session::flash('error','Enter Valid Data');
            Session::save();
            return view('products.edit-product');
        }
        else{
            $product = Product::find($id);
            $product->update($request->all());
            Session::flash('success','Products updated successfully.');
            Session::save();
            return redirect()->route('products.edit-product',$id)->with('success','products updated successfully.');
            
        }
        
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('success','Products deleted successfully.');
        Session::save();
        return view('products.delete-product');
    }
}
