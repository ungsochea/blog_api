<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new BlogPost();
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->category_id = $request->category;
        $post->user_id = 0;
        $post->featured_image_url = 'default.png';

        if($post->save()){
            $photo = $request->file('featurePhoto');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $filename = rand(10000,2000).'.'.$ext;
                if( $ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(),$filename)){
                        $blogPost = BlogPost::find($post->id);
                        $blogPost->featured_image_url = $filename;
                        $blogPost->save();
                    }
                }
            }
            return redirect()->back()->with('success','Saved successfully');
        }
        return redirect()->back()->with('field','Saved successfully');

    }
  
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
        $categories = Category::all();
        return view('blog.edit',compact('blogPost','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->title = $request->title;
        $blogPost->detail = $request->detail;
        $blogPost->category_id = $request->category;
        $blogPost->user_id = 0;
        // $blogPost->featured_image_url = 'default.png';

        if($blogPost->save()){
            $photo = $request->file('featurePhoto');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $filename = rand(10000,2000).'.'.$ext;
                if( $ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(),$filename)){
                        $blogPost = BlogPost::find($blogPost->id);
                        $blogPost->featured_image_url = $filename;
                        $blogPost->save();
                    }
                }
            }
            return redirect()->back()->with('success','Update successfully');
        }
        return redirect()->back()->with('field','Saved successfully');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        if($blogPost->delete()){
            return redirect()->back()->with('success','Deleted successfully');
        }
        return redirect()->route('category.index')->with('failed','Deleted failed');
    }
}
