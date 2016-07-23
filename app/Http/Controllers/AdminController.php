<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Input;
use Validator;
use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        session(['current_menu'=>'']);
        return view('admin/main');
    }

    // Category

    public function getAddCategory()
    {
        session(['current_menu'=>'category']);
        return view('admin/category/add_category');
    }

    public function postAddCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_category'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::table('tb_category')->insert([
                'title'       =>  $request->title_category,
                'created_at'  =>  date('Y-m-d h:i:s'),
                'updated_at'  =>  date('Y-m-d h:i:s')
            ]);
            return redirect()->back()->with('status', 'success');
        }
    }

    public function getEditCategory()
    {
        session(['current_menu'=>'category']);
        return view('admin/category/edit_category');
    }

    public function getEditCategoryId(Request $request)
    {
        session(['current_menu'=>'category']);
        return view('admin/category/edit_category_id')->with('id', $request->id);
    }

    public function postUpdateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_category'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::table('tb_category')->where('id', $request->id)->update([
                'title'       =>  $request->title_category,
                'updated_at'  =>  date('Y-m-d h:i:s')
            ]);
            return redirect()->action('AdminController@getEditCategory')->with('status', 'success');
        }
    }

    public function getDeleteCategory()
    {
        session(['current_menu'=>'category']);
        return view('admin/category/delete_category');
    }

    public function postDeleteCategory(Request $request)
    {
        DB::table('tb_category')->where('id', $request->id)->delete();
        return redirect()->back()->with('status', 'delete success');
    }

    // Product

    public function getAddProduct()
    {
        session(['current_menu'=>'product']);
        return view('admin/product/add_product');
    }

    public function postAddProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'    =>  'required',
            'code'        =>  'required',
            'title'       =>  'required',
            'price'       =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $filename_1 = null; $filename_2 = null; $filename_3 = null;
            if ($request->file('image_1') != null) {
                $destinationPath = 'uploads/items';
                $extension = Input::file('image_1')->getClientOriginalExtension();
                $filename_1 = rand(111111111,999999999).'.'.$extension;
                Input::file('image_1')->move($destinationPath, $filename_1);
            }
            if ($request->file('image_2') != null) {
                $destinationPath = 'uploads/items';
                $extension = Input::file('image_2')->getClientOriginalExtension();
                $filename_2 = rand(111111111,999999999).'.'.$extension;
                Input::file('image_2')->move($destinationPath, $filename_2);
            }
            if ($request->file('image_3') != null) {
                $destinationPath = 'uploads/items';
                $extension = Input::file('image_3')->getClientOriginalExtension();
                $filename_3 = rand(111111111,999999999).'.'.$extension;
                Input::file('image_3')->move($destinationPath, $filename_3);
            }
            DB::table('tb_item')->insert([
                'category'    =>  $request->category,
                'code'        =>  $request->input('code'),
                'title'       =>  $request->input('title'),
                'detail'      =>  $request->input('detail'),
                'image_1'     =>  $filename_1,
                'image_2'     =>  $filename_2,
                'image_3'     =>  $filename_3,
                'price'       =>  $request->price,
                'created_at'  =>  date('Y-m-d h:i:s'),
                'updated_at'  =>  date('Y-m-d h:i:s')
            ]);
        }
        return redirect()->back()->with('status', 'เพิ่มสินค้าสำเร็จ');
    }

    public function getEditProduct()
    {
        session(['current_menu'=>'product']);
        return view('admin/product/edit_product');
    }

    public function getEditProductId(Request $request)
    {
        session(['current_menu'=>'product']);
        return view('admin/product/edit_product_id')->with('id', $request->id);
    }

    public function postEditProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'    =>  'required',
            'code'        =>  'required',
            'title'       =>  'required',
            'price'       =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $filename_1 = null; $filename_2 = null; $filename_3 = null;
            if ($request->file('image_1') != null) {
                $destinationPath = 'uploads/items';
                $extension = Input::file('image_1')->getClientOriginalExtension();
                $filename_1 = rand(111111111,999999999).'.'.$extension;
                Input::file('image_1')->move($destinationPath, $filename_1);
            } else {
                $read_url = DB::table('tb_item')->select('image_1')->where('id', $request->id)->first();
                $filename_1 = $read_url->image_1;
            }
            if ($request->file('image_2') != null) {
                $destinationPath = 'uploads/items';
                $extension = Input::file('image_2')->getClientOriginalExtension();
                $filename_2 = rand(111111111,999999999).'.'.$extension;
                Input::file('image_2')->move($destinationPath, $filename_2);
            } else {
                $read_url = DB::table('tb_item')->select('image_2')->where('id', $request->id)->first();
                $filename_2 = $read_url->image_2;
            }
            if ($request->file('image_3') != null) {
                $destinationPath = 'uploads/items';
                $extension = Input::file('image_3')->getClientOriginalExtension();
                $filename_3 = rand(111111111,999999999).'.'.$extension;
                Input::file('image_3')->move($destinationPath, $filename_3);
            } else {
                $read_url = DB::table('tb_item')->select('image_3')->where('id', $request->id)->first();
                $filename_3 = $read_url->image_3;
            }
            DB::table('tb_item')->where('id', $request->id)->update([
                'category'    =>  $request->category,
                'code'        =>  $request->input('code'),
                'title'       =>  $request->input('title'),
                'detail'      =>  $request->input('detail'),
                'image_1'     =>  $filename_1,
                'image_2'     =>  $filename_2,
                'image_3'     =>  $filename_3,
                'price'       =>  $request->price,
                'created_at'  =>  date('Y-m-d h:i:s'),
                'updated_at'  =>  date('Y-m-d h:i:s')
            ]);
        }
        return redirect()->back()->with('status', 'แก้ไขสินค้าสำเร็จ');
    }

    public function getDeleteProduct()
    {
        session(['current_menu'=>'product']);
        return view('admin/product/delete_product');
    }

    public function getDeleteProductId(Request $request)
    {
        DB::table('tb_item')->where('id', $request->id)->delete();
        return redirect()->back()->with('status', 'delete success');
    }

    public function getChangeBanner()
    {
        session(['current_menu'=>'banner']);
        return view('admin/banner/change_banner');
    }

    public function postChangeBanner(Request $request)
    {
        $filename_1 = null; $filename_2 = null; $filename_3 = null; $filename_4 = null;
        if ($request->file('image_1') != null) {
            $destinationPath = 'uploads/banner';
            $extension = Input::file('image_1')->getClientOriginalExtension();
            $filename_1 = rand(111111111,999999999).'.'.$extension;
            Input::file('image_1')->move($destinationPath, $filename_1);
        } else {
            $read_url = DB::table('tb_banner')->select('image_1')->where('id', 1)->first();
            $filename_1 = $read_url->image_1;
        }
        if ($request->file('image_2') != null) {
            $destinationPath = 'uploads/banner';
            $extension = Input::file('image_2')->getClientOriginalExtension();
            $filename_2 = rand(111111111,999999999).'.'.$extension;
            Input::file('image_2')->move($destinationPath, $filename_2);
        } else {
            $read_url = DB::table('tb_banner')->select('image_2')->where('id', 1)->first();
            $filename_2 = $read_url->image_2;
        }
        if ($request->file('image_3') != null) {
            $destinationPath = 'uploads/banner';
            $extension = Input::file('image_3')->getClientOriginalExtension();
            $filename_3 = rand(111111111,999999999).'.'.$extension;
            Input::file('image_3')->move($destinationPath, $filename_3);
        } else {
            $read_url = DB::table('tb_banner')->select('image_3')->where('id', 1)->first();
            $filename_3 = $read_url->image_3;
        }
        if ($request->file('image_4') != null) {
            $destinationPath = 'uploads/banner';
            $extension = Input::file('image_4')->getClientOriginalExtension();
            $filename_4 = rand(111111111,999999999).'.'.$extension;
            Input::file('image_4')->move($destinationPath, $filename_4);
        } else {
            $read_url = DB::table('tb_banner')->select('image_4')->where('id', 1)->first();
            $filename_4 = $read_url->image_4;
        }
        DB::table('tb_banner')->update([
            'image_1'     =>  $filename_1,
            'image_2'     =>  $filename_2,
            'image_3'     =>  $filename_3,
            'image_4'     =>  $filename_4
        ]);
        return redirect()->back()->with('status', 'แก้ไขแบนเนอร์สำเร็จ');
    }
}
