<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\photo;
use Illuminate\Http\Request;

class albumController extends Controller
{
    public function index(){
        $albums = album::all();
        return view('welcome', ['albums' => $albums]);
    }
    public function create(Request $request){
        $request->validate([
            'albumName' => 'required|max:255',
        ]);

        album::create(['name'=>$request->albumName]);

        return back()->with('status', 'Album created!');
    }
    public function delete(Request $request){
        $photos = photo::where("album_id",$request->id)->get();
        $albums = Album::where('id', '!=', $request->id)->get();

        if(count($photos) > 0 && count($albums)>0){
            return back()->with(['albumsSec' => $albums, 'id' => $request->id]);
        }
        album::where('id',$request->id)->delete();
        return back()->with(['status' => 'Album deleted!']);
    }
    public function move(Request $request){
        photo::where("album_id",$request->id)->update([
            'album_id'=>$request->album_id
        ]);
        album::where('id',$request->id)->delete();
        return back()->with(['status' => 'Album deleted And Moved photos Done!']);
    }
    public function deleteAll(Request $request){
        photo::where("album_id", $request->id)->delete();
        album::where('id', $request->id)->delete();
        return back()->with(['status' => 'Album deleted and all photos deleted successfully']);
    }
}
