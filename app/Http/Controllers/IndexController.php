<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $banner_link=1;
        $sidebar = 1;
        $home_content = view('pages.home_content');
        return view('index')->with('main_content', $home_content)
                        ->with('sidebar', $sidebar)
                        ->with ('banner_link',$banner_link);
    }

    public function blog_details() {

        $banner_link = 1;
        $sidebar = 1;
        $blog_details = view('pages.blog_details');
        return view('index')->with('main_content', $blog_details)
                        ->with('sidebar', $sidebar)
                        ->with('banner_link',$banner_link);
    }

    public function contact() {

        $banner_link=0;
        $sidebar = 0;
        $contact = view('pages.contact');
        return view('index')->with('main_content', $contact)
                        ->with('sidebar', $sidebar)
                        ->with ('banner_link',$banner_link);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
