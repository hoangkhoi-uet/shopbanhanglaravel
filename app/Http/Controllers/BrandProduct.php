<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Brand;
use App\Models\Category;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand_product() {
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }

    public function all_brand_product() {
        $this->AuthLogin();

        $all_brand_product = Brand::get();

        $manager_brand_product = view('admin.all_brand_product')
            ->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    /**
     * Save data for add new brand product
     */
    public function save_brand_product(Request $request) {
        $this->AuthLogin();

        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];

        $brand->save();

        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add-brand-product');
    }

    /**
     * Unactive and active (unlike and like)
     */
    public function unactive_brand_product($brand_product_id) {
        $this->AuthLogin();

        DB::table('tbl_brand')
            ->where('brand_id', $brand_product_id)
            ->update(['brand_status' => 0]);
        Session::put('message', 'Ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function active_brand_product($brand_product_id) {
        $this->AuthLogin();

        DB::table('tbl_brand')
            ->where('brand_id', $brand_product_id)
            ->update(['brand_status' => 1]);
        Session::put('message', 'Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    
    /**
     * 
     */
    public function edit_brand_product($brand_product_id) {
        $this->AuthLogin();

        $edit_brand_product = Brand::find($brand_product_id);

        return view('admin.edit_brand_product')->with('edit_value', $edit_brand_product);


        // $manager_brand_product = view('admin.edit_brand_product')
        //     ->with('edit_brand_product', $edit_brand_product);
        // return view('admin_layout')
        //     ->with('admin.edit_brand_product', $manager_brand_product);

    }

    /**
     * update data for edit brand product
     */
    public function update_brand_product(Request $request, $brand_product_id) {
        $this->AuthLogin();

        $data = $request->all();
        $brand = Brand::find($brand_product_id);    //find brand by id

        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];

        $brand->save();

        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function delete_brand_product($brand_product_id) {
        $this->AuthLogin();

        Brand::destroy($brand_product_id);

        Session::put('message', 'Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    //For home pages
    public function show_brand_home($brand_id) {
        $cate_product = Category::where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = Brand::where('brand_status', 1)->orderby('brand_id', 'desc')->get();

        $brand_by_id = Brand::find($brand_id)->products;    //return all product by brand_id

        $brand_n = Brand::find($brand_id); //Get brand by brand_id


        // $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();

        // $brand_by_id = DB::table('tbl_product')
        //     ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
        //     ->where('tbl_product.brand_id', $brand_id)->get();
        
        // $brand_n = DB::table('tbl_brand')->where('tbl_brand.brand_id', $brand_id)->limit(1)->get();

        return view('pages.brand.show_brand')->with('category', $cate_product)->with('brand', $brand_product)->with('brand_by_id', $brand_by_id)->with('brand_n', $brand_n);
    }
}
