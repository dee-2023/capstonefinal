<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add() {
        return view('admin.category.create');
    }
    public function insert(Request $request) {
        $category = new Category();
       
        if($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'),$filename);
            $category->image = $filename;
        } 
    
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->hide = $request->input('hide') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        
     
        $category->save();
        return redirect('/admin')->with('status','Category Added Successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'images/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'),$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->hide = $request->input('hide') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('admin')->with('status',"Category saved successfully");
        
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->image)
        {
            $path = 'images/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', "Category Deleted Successfully");
    }
}
