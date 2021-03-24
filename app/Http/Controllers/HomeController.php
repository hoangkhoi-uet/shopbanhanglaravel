<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        // ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')->orderby('tbl_product.product_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->get();
        return view('pages.home')->with('all_product', $all_product)->with('category', $cate_product)->with('brand', $brand_product);
        // ->limit(6)
    }

    public function search(Request $request) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
        
        $search_word = $request->keyword_submit;
        $search_product = DB::table('tbl_product')
        ->where('product_name', 'like', '%'.$search_word.'%')->get();

        return view('pages.product.search')
        ->with('category', $cate_product)->with('brand', $brand_product)
        ->with('search_product', $search_product);

    }


    public function send_mail() {
        // $to_name = "SHOPEE";
        // $to_email = "hkshop497@gmail.com";//send to this email

        // $data = array("name"=>"Mail tu shopee", "body"=>"Testjsaigasdomjfa"); //body of mail.blade.php

        // Mail::send('emails.my_mail', $data, function($message) use ($to_name,$to_email){
        // $message->to($to_email)->subject("quen mat khua");
        // $message->from($to_email,$to_name);//send from this mail
        // });


        $details = [
            'title' => 'Mail from HK SHOP',
            'body' => 'Your order id is: 14632
            Product: GT730 2GD5'
        ];
    
        \Mail::to('truonggiangpctn@gmail.com')->send(new \App\Mail\MyMail($details));
    
        dd("Email is Sent.");


    }

}
