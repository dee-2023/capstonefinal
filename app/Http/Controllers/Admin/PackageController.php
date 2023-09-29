<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{   
   

    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }
    public function add()
    {
        $category = Category::all();
        return view('admin.package.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $user = auth()->user();
        $packages = new Package();
        if($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'),$filename);
            $packages->image = $filename;
        } 
        $packages-> cate_id = $request->input('cate_id');
        $packages-> title = $request->input('title');
        $packages-> description = $request->input('description');
        $inclusions = $request->input('inclusions', []);
        $packages->inclusions = $inclusions;
        $packages-> price = $request->input('price');
        $packages->created_by = $user->id;

        $packages->save();
        return redirect()->route('adminview-packages')->with('status', 'Package added successfully!');
    }
    
    public function edit($id)
    {
        $packages = Package::find($id);
        return view('admin.package.edit', compact('packages'));
    }
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $packages = Package::find($id);
        if($request->hasFile('image')) 
        {
            $path = 'images/'.$packages->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'),$filename);
            $packages->image = $filename;
        } 
        $packages-> title = $request->input('title');
        $packages-> description = $request->input('description');
        $inclusions = $request->input('inclusions', []);
        $packages->inclusions = $inclusions;
        $packages-> price = $request->input('price');
        $packages->created_by = $user->id;

        $packages->update();
        
        return redirect('packages')->with('status',"Package updated successfully");

    }
    public function destroy($id)
    {
        $packages = Package::findOrFail($id);
        if($packages->image)
        {
            $path = 'images/'.$packages->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $packages->delete();
        return redirect('packages')->with('status', "Package Deleted Successfully");
    }


}

