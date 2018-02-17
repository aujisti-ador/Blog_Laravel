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
        $all_category = DB::table('tbl_category')
                ->select('*')
                ->get();
        $manage_category = view('admin.pages.manage_category')
                ->with('all_category', $all_category);
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_category);
    }

    public function edit_category($category_id) {
        $category_info_by_id = DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->first();
        $edit_category = view('admin.pages.edit_category')
                ->with('category_info', $category_info_by_id);
        return view('admin.admin_master')
                        ->with('admin_main_content', $edit_category);
    }

    public function update_category(Request $request) {
        $data = array();
        $category_id = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return redirect::to('/manage_category');
    }

    public function delete_category($category_id) {
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->delete();
        return redirect::to('/manage_category');
    }

    public function unpublish_category($category_id) {
        $data = array();
        $data['publication_status'] = 0;

        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return redirect::to('/manage_category');
    }

    public function publish_category($category_id) {
        $data = array();
        $data['publication_status'] = 1;

        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return redirect::to('/manage_category');
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
