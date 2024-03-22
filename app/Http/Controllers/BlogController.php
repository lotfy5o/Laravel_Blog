<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogReq;
use App\Http\Requests\UpdateBlogReq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    // the commented constructor is another solution for:
    // if (Auth::check()).... inside the create function.

    // public function __construct()
    // {
    //     $this->middleware('auth')->only('[create]');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // instead of this if I can use a middleware:
        // $this->middleware('auth')->only(['create']);
        if (Auth::check()) {
            $categories = Category::get();
            return view('theme.blogs.create', compact('categories'));
        }

        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogReq $request)
    {
        $data = $request->validated();
        // steps of uploading an image
        // 1- get the image
        $image = $request->image;
        // 2-rename the image
        $newImageName = time() . '_' . $image->getClientOriginalName();
        // 3-move the image to my project
        $image->storeAs('blogs', $newImageName, 'public');
        // 4-save new name to my project
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::user()->id;

        // create record inside the database
        Blog::create($data);
        return back()->with('Blog-status', 'Your Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::user()->id == $blog->user_id) {

            $categories = Category::get();
            return view('theme.blogs.edit', compact('categories', 'blog'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogReq $request, Blog $blog)
    {
        if (Auth::user()->id == $blog->user_id) {

            $data = $request->validated();
            // steps of uploading an image
            if ($request->hasFile('image')) {

                // 0- delte old image
                Storage::delete("public/blogs/$blog->image");

                // 1- get the image
                $image = $request->image;
                // 2-rename the image
                $newImageName = time() . '_' . $image->getClientOriginalName();
                // 3-move the image to my project
                $image->storeAs('blogs', $newImageName, 'public');
                // 4-save new name to my project
                $data['image'] = $newImageName;
            }

            $blog->update($data);
            return back()->with('BlogUpdateStatus', 'Your Blog Updated Successfully');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::user()->id == $blog->user_id) {

            Storage::delete("public/blogs/$blog->name");
            $blog->delete();

            return back()->with("BlogDeleteStatus", "Your Blog Deleted Successfully");
        }
    }

    public function myBlogs(Blog $blog)
    {
        if (Auth::check()) {

            $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);

            return view('theme.blogs.my-blogs', compact('blogs'));
        }
        abort(403);
    }
}
