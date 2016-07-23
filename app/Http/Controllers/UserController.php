<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user');
    }

    public function index()
    {
        if (Auth::User()) {
            session(['current_menu'=>'']);
            return view('admin/main');
        } else {
            session(['current_menu'=>'home']);
            return view('user/home');
        }
    }

    public function getViewItem(Request $request)
    {
        return view('user/view_item')->with('id', $request->id);
    }

    public function getHowToBuy()
    {
        session(['current_menu'=>'how_to_buy']);
        return view('user/how_to_buy');
    }

    public function getHowToPayment()
    {
        session(['current_menu'=>'how_to_payment']);
        return view('user/how_to_payment');
    }

    public function getHowToSend()
    {
        session(['current_menu'=>'how_to_send']);
        return view('user/how_to_send');
    }

    public function getAbout()
    {
        session(['current_menu'=>'about']);
        return view('user/about');
    }

    public function getContact()
    {
        session(['current_menu'=>'contact']);
        return view('user/contact');
    }
}
