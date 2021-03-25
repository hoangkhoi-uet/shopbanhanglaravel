<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Social;
use App\Models\Admin;
use Socialite;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }

    public function show_dashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {

        $data = $request->all();
        $admin_email = $data['Email'];
        $admin_password = md5($data['Password']);
        $login = Admin::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        $login_count = $login->count();
        if($login) {
            Session::put('admin_name', $login->admin_name);
            Session::put('admin_id', $login->admin_id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Wrong email or password!');
            return Redirect::to('/admin');
        }


        // $admin_email = $request->Email;
        // $admin_password = md5($request->Password);

        // $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // if($result) {
        //     Session::put('admin_name', $result->admin_name);
        //     Session::put('admin_id', $result->admin_id);
        //     return Redirect::to('/dashboard');
        // } else {
        //     Session::put('message', 'Wrong email or password!');
        //     return Redirect::to('/admin');
        // }
    }

    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function logout() {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }



    //Login FB
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){ //Neu co thong tin trng db
            //login in vao trang quan tri  
            $account_name = Admin::where('admin_id',$account->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Sign in success!');
        }else{

            $new_account = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Admin::where('admin_email', $provider->getEmail())->first();   //Get email

            if(!$orang){
                $orang = Admin::create([
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_name' => $provider->getName(),
                    'admin_phone' => ''
                ]);
            }
            $new_account->login()->associate($orang);
            $new_account->save();

            $account_name = Admin::where('admin_id', $account->user)->first();

            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_id', $account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Sign in success!');
        } 
    }

}
