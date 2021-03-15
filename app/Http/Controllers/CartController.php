<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
 
        //Get product id and quantity to add cart
        $productId = $request->productIdHidden; 
        $quantity = $request->qty;

        //Get product by product id
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['qty'] = $quantity;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '1000';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        
        return Redirect::to('/show-cart');
    }

    public function show_cart() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
 
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function delete_from_cart($rowId) {
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }

    public function update_quantity(Request $request) {
        $row = $request->rowId_cart;
        $new_qty = $request->update_qty;
        Cart::update($row, $new_qty);
        return Redirect::to('/show-cart');

    }
}
