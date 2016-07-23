<?php

namespace App\Http\Controllers\Auth;

use Auth;
use DB;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'prefix'                  =>  'required',
            'firstname'               =>  'required|unique:tb_user',
            'lastname'                =>  'required',
            'address'                 =>  'required',
            'tel'                     =>  'required|unique:tb_user',
            'email'                   =>  'required|unique:tb_user',
            'username'                =>  'required|unique:tb_user',
            'password'                =>  'required|confirmed|min:4',
            'password_confirmation'   =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::table('tb_user')->insert([
                'prefix'              =>  $request->get('prefix'),
                'firstname'           =>  $request->get('firstname'),
                'lastname'            =>  $request->get('lastname'),
                'address'             =>  $request->get('address'),
                'tel'                 =>  $request->get('tel'),
                'email'               =>  $request->get('email'),
                'username'            =>  $request->get('username'),
                'password'            =>  Hash::make($request->get('password')),
                'created_at'          =>  date('Y-m-d h:i:s'),
                'updated_at'          =>  date('Y-m-d h:i:s')
            ]);
            return redirect('/')->with('status', 'สมัครสมาชิกสำเร็จ');
        }
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'                =>  'required',
            'password'                =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt(['username'=>$request->get('username'),'password'=>$request->get('password')])){
                if (Auth::User()->username == 'admin') {
                    return redirect()->action('AdminController@index');
                } else {
                    return redirect()->action('UserController@index');
                }
            } else {
                return redirect()->route('logout', ['username'=>$request->get('username')]);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('UserController@index');
    }

}
