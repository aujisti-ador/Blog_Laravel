<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class indexController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $all_published_blog = DB::table('tbl_blog')
                ->where('publication_status', 1)
                ->orderby('blog_id', 'desc')
                ->get();

        $banner_link = 1;
        $sidebar = 1;
        $home_content = view('pages.home_content')
                ->with('all_published_blog', $all_published_blog);

        return view('index')->with('main_content', $home_content)
                        ->with('sidebar', $sidebar)
                        ->with('banner_link', $banner_link);
    }

    public function blog_details($blog_id) {

        $banner_link = 0;
        $sidebar = 1;
        $blog_info = DB::table('tbl_blog')
                ->where('blog_id', $blog_id)
                ->first();

        $blog_details = view('pages.blog_details')
                ->with('blog_info', $blog_info);
        return view('index')->with('main_content', $blog_details)
                        ->with('sidebar', $sidebar)
                        ->with('banner_link', $banner_link);
    }
    
    public function blog_post_by_category($category_id){
        
        $all_published_blog_by_category = DB::table('tbl_blog')
                ->where('publication_status', 1)
                ->where('category_id', $category_id)
                ->orderby('blog_id', 'desc')
                ->get();

        $banner_link = 1;
        $sidebar = 1;
        $home_content = view('pages.home_content')
                ->with('all_published_blog', $all_published_blog_by_category);

        return view('index')->with('main_content', $home_content)
                        ->with('sidebar', $sidebar)
                        ->with('banner_link', $banner_link);
    }

    public function contact() {

        $banner_link = 0;
        $sidebar = 0;
        $contact = view('pages.contact');
        return view('index')->with('main_content', $contact)
                        ->with('sidebar', $sidebar)
                        ->with('banner_link', $banner_link);
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
