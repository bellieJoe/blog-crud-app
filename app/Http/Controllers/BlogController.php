<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'stream']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where([
            'owner_id' => Auth::user()->user_id
        ])
        ->leftJoin('users', 'blogs.owner_id', '=', 'users.user_id' )
        ->orderBy('blogs.updated_at', 'desc')
        ->paginate(10);

        return view('pages.blog.blog')
        ->with([
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => ['required', 'max:100'],
            'blog_content' => ['required', 'max:3000']
        ]);

        Blog::create([
            'owner_id' => Auth::user()->user_id,
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content
        ]);

        return back()->with([
            'message' =>  'Blog successfully save.',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.blog.show')
        ->with([
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('pages.blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'blog_title' => ['required', 'max:100'],
            'blog_content' => ['required', 'max:3000']
        ]);

        Blog::find($id)
        ->update([
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content
        ]);

        return back()->with([
            'message' => 'Blog successfully updated',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();

        return redirect()->route('blog.index');
    }

    public function stream(){
        $blogs = Blog::query()
        ->leftJoin('users', 'blogs.owner_id', '=', 'users.user_id')
        ->paginate(2);
        
        return view('pages.home', [
            'blogs' => $blogs
        ]);
    }
}
