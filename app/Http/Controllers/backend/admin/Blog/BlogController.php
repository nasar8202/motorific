<?php

namespace App\Http\Controllers\backend\admin\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlog;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function addBlogForm()
    {
        return view('backend.admin.blogs.addBlogForm');
    }
    public function addBlog(StoreBlog  $request)
    {

        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {

                $image = time() . '_' . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path() . '/blogs/images/', $image);
            } else {
                // Handle the case when no image is uploaded
                // You can set a default image or display an error message
                $image = 'default.jpg';
            }
            // $slug = Str::slug($request->title);

            $blog = new Blog();
            $blog->title = $request->title;
            $blog->short_description = $request->short_description;
            $blog->slug = $request->slug;
            $blog->image = $image;
            $blog->long_description = $request->long_description;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        return redirect()->route('viewBlogs')->with('success', 'Blog created successfully.');
    }

    public function viewBlogs()
    {
        $allBlogs = Blog::where('status', 0)->orderBy("created_at", "Desc")->get();
        return view("backend.admin.blogs.viewBlogs", compact('allBlogs'));
    }

    public function editBlogForm($id)
    {
        $editBlog = Blog::where('id', $id)->first();
        return view('backend.admin.blogs.editBlogForm', compact('editBlog'));
    }

    public function updateBlog(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::findOrFail($id);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the existing image file if it exists
                if ($blog->image && file_exists(public_path("blogs/images/{$blog->image}"))) {
                    unlink(public_path("blogs/images/{$blog->image}"));
                }
            
                // Upload the new image file
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('blogs/images/'), $imageName);
            
                $blog->image = $imageName;
            }
            
            // Update other blog fields
            $blog->title = $request->title;
            $blog->short_description = $request->short_description;
            $blog->slug = $request->slug;
            $blog->long_description = $request->long_description;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            
            $blog->save();
            
            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        return redirect()->route('viewBlogs')->with('success', 'Blog updated successfully.');
    }
    public function deleteBlog($id)
    {
        $removeImage = Blog::where('id', $id)->first();
        if (file_exists(public_path("/blogs/images/" . $removeImage->image))) {
            unlink(public_path("/blogs/images/" . $removeImage->image));
        }
        $delete = Blog::where('id', $id)->delete();
        return redirect()->route('viewBlogs')->with('success', 'Blog updated successfully.');
    }
}
