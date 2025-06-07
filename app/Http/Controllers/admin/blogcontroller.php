<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class blogcontroller extends Controller
{
    public function blog_view()
    {
        return view('admin.blog.add_blog');
    }

    public function blog_add(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $img = null;
        if ($request->hasFile('image')) {
            $img = 'blkheart' . rand(111111111, 999999999) . '.' . $request->image->extension();
            $request->image->move(public_path('blog_images'), $img);
        }

        DB::table('blog')->insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'date' => $request->date,
            'image' => $img,
        ]);

        return back()->with('success', 'Blog inserted successfully');
    }

    public function blog_show()
    {
        $data['blog'] = DB::table('blog')->get();
        return view('admin.blog.show_blog', $data);
    }

    public function blog_delete(Request $request)
    {
        DB::table('blog')->where('blog_id', $request->blog_id)->delete();
        return redirect('blog_show')->with('success', 'Blog deleted successfully');
    }

    public function blog_edit(Request $request)
    {
        $data['blog'] = DB::table('blog')->where('blog_id', $request->blog_id)->first();
        return view('admin.blog.edit_blog', $data);
    }

    public function blog_update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_image' => 'nullable|string'
        ]);

        $img = $request->old_image ?? null;

        if ($request->hasFile('image')) {
            $img = 'blkheart' . rand(111111111, 999999999) . '.' . $request->image->extension();
            $request->image->move(public_path('blog_images'), $img);
        }

        DB::table('blog')->where('blog_id', $request->blog_id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'date' => $request->date,
            'image' => $img
        ]);

        return redirect('blog_show')->with('success', 'Blog updated successfully');
    }

    public function details(Request $request)
    {
        $data['details'] = DB::table('blog')->where('blog_id', $request->blog_id)->first();
        return view('admin.blog.blog_details', $data);
    }
}
