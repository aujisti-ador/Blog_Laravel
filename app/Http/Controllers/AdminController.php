<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->checkLogin();
        return view('admin.admin_login');
    }

    public function admin_login_check(Request $request) {
        $email_address = $request->email_address;
        $admin_password = $request->admin_password;
//        echo $email_address."------------".$admin_password;

        $result = DB::table('tbl_admin')
                ->select('*')
                ->where('email_address', $email_address)
                ->where('admin_password', md5($admin_password))
                ->first();
        //$results = DB::table('tbl_admin')->count();
//        echo '<pre>';
//        print_r($result);
        if ($result) {
            //echo "admin login done!";
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);
            return redirect::to('dashboard');
        } else {
            Session::put('message', 'wrong resultname or password!');
            return redirect::to('admin_panel');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkLogin() {
        //to prevent from back button and check whether user logged in or not
        $admin_id = Session::get('admin_id');

        if ($admin_id != NULL) {
            return redirect::to('dashboard')->send();
        }
    }

    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
