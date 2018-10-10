<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();
class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authCheck();

        $home_admin = view('admin.pages.admin_home');
        return view('admin.admin_master')
        -> with('admin_main_content', $home_admin);
    }
	
	    /*Logout*/
    public function logout()
    {
        Session::put('admin_name','');
        Session::put('admin_id','');
        Session::put('message','You are successfully logout!');
        return Redirect::to('/admin');

    }

    public function authCheck(){
        $admin_id = Session::get('admin_id');

        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    /*Add Category*/
    public function addCategory(){
        $this->authCheck();
        $add_category = view('admin.pages.add_category');
        return view('admin.admin_master')
        -> with('admin_main_content', $add_category);
    }

    /*Save Category*/
    public function saveCategory(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('category') -> insert($data);
        Session::put('message','Data Save Successfully!!');
        return Redirect::to('/add-category'); 
    }


    /*Manage Category*/
    public function manageCategory(){
        $this->authCheck();
        $all_category = DB::table('category') 
        -> get();
        $manage_category = view('admin.pages.manage_category') -> with('all_category_info', $all_category);
        return view('admin.admin_master') -> with('admin_main_content', $manage_category);
    }

    /*Unpublished Category*/
    public function unpublishedCategory($category_id){
        DB::table('category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
        return Redirect::to('/manage-category');     
    }

    /*Published Category*/
    public function publishedCategory($category_id){
        DB::table('category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
        return Redirect::to('/manage-category');     
    }

    /*Delete Category*/
    public function deleteCategory($category_id){
        DB::table('category')
            ->where('category_id', $category_id)
            ->delete();
        return Redirect::to('/manage-category');     
    }

    /*Edit Category*/
    public function editCategory($category_id){
        $category_info = DB::table('category')
            ->where('category_id', $category_id)
            ->first();

        $edit_category = view('admin.pages.edit_category')
            -> with('category_info', $category_info);
        return view('admin.admin_master')
        -> with('admin_main_content', $edit_category); 

        return Redirect::to('/edit-category');   
    }

    /*Update Category*/
    public function updateCategory(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $category_id = $request->category_id;
        DB::table('category')
            ->where('category_id', $category_id)
            ->update($data);
        //Session::put('message','Data Save Successfully!!');
        return Redirect::to('/manage-category'); 
    }



    /*Add Post*/

    public function addBlog(){
        $published_category = DB::table('category')
        ->get();

        $add_blog_page = view('admin.pages.add_blog')
        -> with('published_category', $published_category);
        return view('admin.admin_master')
        -> with('admin_main_content', $add_blog_page);

    }


    /* Save Post*/
    public function savePost(Request $request){
        $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['category_id'] = $request->category_id;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_image'] = '-----';
        $data['author_name'] = Session::get('admin_name');
        $data['publication_status'] = $request->publication_status;
        DB::table('blog') -> insert($data);
        Session::put('message','Post Save Successfully!!');
        return Redirect::to('/add-blog'); 

    }

    /*Manage Post*/
    public function managePost(){
        $this->authCheck();
        $all_post = DB::table('blog') 
        -> get();
        $manage_post = view('admin.pages.manage_post') -> with('all_post_info', $all_post);
        return view('admin.admin_master') -> with('admin_main_content', $manage_post);
    }

    /*Unpublished Post*/
    public function unpublishedPost($blog_id){
        DB::table('blog')
            ->where('blog_id', $blog_id)
            ->update(['publication_status' => 0]);
        return Redirect::to('/manage-post');     
    }

    /*Published Post*/
    public function publishedPost($blog_id){
        DB::table('blog')
            ->where('blog_id', $blog_id)
            ->update(['publication_status' => 1]);
        return Redirect::to('/manage-post');     
    }
    

    /* Delete Post */
    public function deletePost($blog_id){
    DB::table('blog')
    ->where('blog_id', $blog_id)
    ->delete();
        return Redirect::to('/manage-post');     
    }


    /*Edit Post*/
    public function editPost($blog_id){
        $post_info = DB::table('blog')
            ->where('blog_id', $blog_id)
            ->first();

        $edit_post = view('admin.pages.edit_post')
            -> with('post_info', $post_info);
        return view('admin.admin_master')
        -> with('admin_main_content', $edit_post); 

        return Redirect::to('/edit-post');   
    }




















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
