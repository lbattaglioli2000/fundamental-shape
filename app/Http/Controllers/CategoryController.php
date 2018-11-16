<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.help.new.category');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Category created successfully!');
    }
}
