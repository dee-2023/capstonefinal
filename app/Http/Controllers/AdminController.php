<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usersview() {
        $users = User::all();
        if (auth()->check()) {
            if (auth()->user()->role == 'user') {
                return view('home')->with('message', "You are not an Admin");
            } elseif (auth()->user()->role == 'admin') {
                return view('admin.users', ['users' => $users]);
            }
        }
          return redirect()->route('auth.login')->with('status', 'Unauthorized access.');
    }
}
