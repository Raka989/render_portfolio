<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class portfoliocontroller extends Controller
{
    public function portfolio_view()
    {
        return view('admin.portfolio.add_portfolio');
    }

    public function portfolio_add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $img = 'blkheartyt' . rand(111111111, 999999999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('admin/portfolio/show_portfolio'), $img);

            $arrayname = [
                'image' => $img,
            ];

            DB::table('portfolio')->insert($arrayname);

            return back()->with('success', 'Portfolio inserted successfully');
        }

        return back()->with('failed', 'Image upload failed');
    }

    public function portfolio_show()
    {
        $data['portfolio'] = DB::table('portfolio')->get();
        return view('admin.portfolio.show_portfolio', $data);
    }

    public function portfolio_delete(Request $request)
    {
        DB::table('portfolio')->where('portfolio_id', $request->portfolio_id)->delete();
        return back()->with('success', 'Portfolio image deleted successfully');
    }

    public function portfolio_edit(Request $request)
    {
        $data['portfolio'] = DB::table('portfolio')->where('portfolio_id', decrypt($request->portfolio_id))->first();
        return view('admin.portfolio.edit_portfolio', $data);
    }

    public function portfolio_update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_image' => 'required|string',
            'portfolio_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $img = "blkheartyt" . rand(111111111, 999999999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('admin/portfolio/show_portfolio'), $img);
        } else {
            $img = $request->old_image;
        }

        $arrayname = [
            'image' => $img,
        ];

        DB::table('portfolio')->where('portfolio_id', $request->portfolio_id)->update($arrayname);

        return redirect('portfolio_show')->with('success', 'Portfolio updated successfully');
    }
}
