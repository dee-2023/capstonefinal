<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blogs.index', ['blogs' => $blogs]);
    }
          
      // Create post
    public function create() {
        return view('blogs.create');
    }

    // Store post
    public function store(Request $request) {
        $user = auth()->user();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            
        ]);
        // Handle file upload
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);
        } else {
            // Handle the case where no image is provided
            return redirect()->back()->with('status', 'Image is required.');
        }

        $blog = new Blog();

        $blog->created_by = $user->id;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->image = $file_name;

        $blog->save();
        return redirect()->route('blogs')->with('status', 'Blog created successfully.');
    }   
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->image)
        {
            $path = 'images/'.$blog->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $blog->delete();
        return redirect('blogs')->with('status', "Blog Deleted Successfully");
    }
}
