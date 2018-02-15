<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class SuperAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->checkLogin();
        //this is Dashboard
        $dashboard_home = view('admin.pages.dashboard_home');
        return view('admin.admin_master')
                        ->with('admin_main_content', $dashboard_home);
    }

    public function add_category() {
        $this->checkLogin();
        $add_category = view('admin.pages.add_category');
        return view('admin.admin_master')
                        ->with('admin_main_content', $add_category);
    }

    public function save_category(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = date("Y-m-d H-i-s");
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Category Saved Successfully!');
        return redirect::to('add_category');
    }

    public function manage_category() {
        $manage_category = view('admin.pages.manage_category');
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_category);
        
    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function logout() {
    Session::put('admin_id', '');
    Session::put('admin_name', '');
    Session::put('message', 'Logout Successfully!');
    return redirect::to('admin_panel');
}

public function checkLogin() {
    //to prevent from back button and check whether user logged in or not
    $admin_id = Session::get('admin_id');

    if ($admin_id == NULL) {
        return redirect::to('admin_panel')->send();
    }
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
