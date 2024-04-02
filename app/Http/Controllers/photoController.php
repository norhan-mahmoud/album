<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\photo;
use Illuminate\Http\Request;

class photoController extends Controller
{
    public function index($id){
        $album= album::where('id',$id)->first();
        return view('gallery', compact('album'));
    }
    public function upload(Request $request, $id)
    {
        try {
            $request->validate([
                'filepond.*' => 'sometimes|image',
            ]);

            if (!$request->hasFile('filepond')) {
                throw new \Exception('No files were uploaded.');
            }

            foreach ($request->file('filepond') as $file) {
                $fileName = 'custom_name_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = 'photos/' . $fileName;

                $file->move(public_path('photos'), $fileName);

                Photo::create([
                    'path' => $filePath,
                    'name' => $fileName,
                    'album_id' => $id
                ]);
            }



            return redirect()->back()->with('success', 'Files uploaded successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while uploading files: ' . $e->getMessage());
        }
    }

    public function delete(Request $request){
        photo::where('id',$request->id)->delete();
        return back()->with('success', 'Image deleted success!');
    }

}
