<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function indexpublic()
    {
        $packages = Package::all();
        return view('packages', compact('packages'));
    }
    public function blogspublic()
    {
        $blogs = Blog::all();
        return view('blogs', compact('blogs'));
    }

}
