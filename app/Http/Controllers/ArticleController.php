<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.help.new.article');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'body' => 'required|string'
        ]);

        Article::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'body' => $request->body
        ]);

        return redirect()->back()->with('success', 'Article created successfully!');
    }
}
