<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
  public function index() {  
    $bookings = Booking::all();

    if (auth()->check()) {
      if (auth()->user()->role == 'user') {
        return redirect()->route('home')->with('status', "Unauthorized access. Please login as Admin"); 

      return view('home');
      } elseif (auth()->user()->role == 'admin') {
        return view('bookings.index', ['bookings' => $bookings]);
      }
    }
    return redirect()->route('login')->with('status', "Unauthorized access. Please login as Admin");   
  }      

  public function show($id) {
    $booking = Booking::findOrFail($id);
    
      return view('bookings.show', ['booking' => $booking]);
  }

  public function book() {
      
    $packages = Package::all();
    if (auth()->check()) {
      if (auth()->user()->role == 'user') {
        return view('bookings.book', compact('packages'));
      } elseif (auth()->user()->role == 'admin') {
        return view('admin.index')->with('status', "Please login as User to Book a Package.");
      }
    }
    return redirect()->route('login')->with('status', "Please login or Register to book a Package");
    }

  public function store(Request $request) {
    
    $user = auth()->user();
       
    $booking = new Booking();
    $inclusions = $request->input('inclusions', []);
    $booking->cust_id = $user->id;
    $booking->name = $user->name;
    $booking->package_id = $request->input('package_id');
    $booking->booking_date = $request->input('booking_date');  
    $booking->inclusions = $inclusions;

    $booking->save();

    return redirect('/bookings/book')->with('status', 'Booking submitted successfully!');
  }

    public function destroy($id) {
      $booking = Booking::findOrFail($id);
      $booking->delete();

      return redirect('/bookings')->with('status', 'Booking deleted successfully.');
    
  }

    public function myBookings(){
      $package = Package::all();
    $user = auth()->user();
    $bookings = Booking::where('cust_id', $user->id)->get(); 
    

    return view('/bookings/my-bookings', compact('bookings'));
    }
}
