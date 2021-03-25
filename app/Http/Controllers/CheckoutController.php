<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
 
        return view('pages.checkout.login_checkout')
        ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function add_customer(Request $request) {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id );
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
 
        return view('pages.checkout.show_checkout')
        ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function save_checkout_customer(Request $request) {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;


        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id );
        return Redirect::to('/payment');
    }

    public function payment() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
 
        return view('pages.checkout.payment')
        ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function logout_checkout() {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request) {
        $email = $request->email_account;
        $pwd = md5($request->password_account);

        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $pwd)->first();
        if($result) {
            Session::put('customer_id', $result->customer_id );

            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();


        $payment_data = array();
        $payment_data['payment_method'] = $request->payment_option;
        $payment_data['payment_status'] = 'Chờ xác nhận';
        $payment_id = DB::table('tbl_payment')->insertGetId($payment_data);


        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Chờ xác nhận';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);


        $content = Cart::content();
        foreach($content as $v_content) {
            $orderdetails_data = array();
            $orderdetails_data['order_id'] = $order_id;
            $orderdetails_data['product_id'] = $v_content->id;
            $orderdetails_data['product_name'] = $v_content->name;
            $orderdetails_data['product_price'] = $v_content->price;
            $orderdetails_data['product_sales_quantity'] = $v_content->qty;
            $orderdetails_id = DB::table('tbl_order_details')->insertGetId($orderdetails_data);
        }
        

        if($payment_data['payment_method']==1) {
            echo 'Thanh toán bằng ATM';
        } elseif($payment_data['payment_method']==2) {
            Cart::destroy();
            return view('pages.checkout.cash_on_delivery')->with('category', $cate_product)->with('brand', $brand_product);
        } else {
            echo 'Thanh toán paypal';
        }

    }

    //Simple Authen Login
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function manager_order() {
        $this->AuthLogin();

        $all_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->select('tbl_order.*', 'tbl_customer.customer_name')
            ->orderby('tbl_order.order_id', 'desc')->get();

        $manager_order = view('admin.manager_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manager_order', $manager_order);
    }


    public function view_order($order_id) {
        $this->AuthLogin();

        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->where('tbl_order.order_id', $order_id)
            // ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->get();


        // echo "<pre>";
        // print_r($order_by_id);
        // echo "</pre>";


        // $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        // return view('admin_layout')->with('admin.manager_order', $manager_order_by_id);



        return view('admin.view_order')->with('order_by_id', $order_by_id);
    }
    
    public function send_mail_confirm($order_id) {
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->where('tbl_order.order_id', $order_id)
            // ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->get();


        $to_email = $order_by_id[0]->shipping_email;
        $details = $order_by_id;
        \Mail::to($to_email)->send(new \App\Mail\MyMail($details));

        return Redirect::to('/view-order/'.$order_id);
        // return view('admin.view_order')->with('order_by_id', $order_by_id);

    }

    public function send_mail(Request $request) {
        $data = array();
        $data['customerName'] = $request->customerName;

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
