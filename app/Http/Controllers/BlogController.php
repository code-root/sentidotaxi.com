<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('site.pages.blog-all', compact('blogs'));
    }


    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $latestBlogs = Blog::latest()->take(10)->get();
        return view('site.pages.blog-details', compact('blog', 'latestBlogs'));
    }




}
