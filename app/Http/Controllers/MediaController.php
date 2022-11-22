<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request){
        $from=$request->from;
        $to=$request->to;
        if($from != null && $to != null){
            $medias=Post::whereBetween('updated_at', [$from, $to])->get();
        }else{

            $medias=Post::get();
        }
        return view('admin.media.media',compact('medias','from','to'));
    }
    public function delete(Request $request){
        $ids = $request->ids;
        
        $posts=Post::whereIn('id',$ids)->get();
        foreach ($posts as $key => $post) {
            $dell = Post::where('id', $post->id)->where('featured_img', 'like', $post->featured_img)->first();
            $dell->update(['featured_img' => null]);
            $featured = public_path('uploads/featured_img/' . $post->featured_img); 
            if(file_exists($featured)){
                unlink($featured);
            } 
        }
        return back()->with('message',"Image Deleted successfully.");
    }
}
