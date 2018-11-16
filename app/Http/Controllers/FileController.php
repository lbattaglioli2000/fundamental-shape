<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post(Request $request){
        $this->validate($request, [
            'filename' => 'required|string',
            'file' => 'required'
        ]);

        $disk = Storage::disk('spaces');

        $path = $disk->putFile('user-files', $request->file('file'), 'private');

        $file = new File();

        $file->user_id = Auth::id();
        $file->description = $request->filename;
        $file->location = $path;
        $file->save();

        return redirect()->back()->with('success', 'File shared!');
    }

    public function get(File $file){
        $url = Storage::temporaryUrl(
            $file->location, now()->addMinutes(3)
        );

        return Redirect::away($url);
    }
}
