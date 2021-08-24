<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = Storage::files('laravel-aws');
        return view('files.index', [
            'files' => $files
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $file_name = Carbon::now()->format('ymdHis') . "_" . $file->getClientOriginalName();
            Storage::put('laravel-aws/' . $file_name, file_get_contents($file));
            return back()->with('success', 'You have successfully upload image.');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'path' => 'required',
        ]);
        $path = $request->get("path");
        if (Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
            return back()->with('success', 'Image Successfully Removed');
        }
    }
}
