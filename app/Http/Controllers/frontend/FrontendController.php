<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\CategorySection;
use App\Models\Menu;
use App\Models\Message;
use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FrontendController extends Controller
{
    public function index(){
        $setting=SiteSetting::first();
        $headline_no=$setting->headline_no;
        $cat_sec=CategorySection::where('status',1)->orderBy('section_order', 'asc')->get();
        $partner=Ad::first();
        $headline_news=Post::where('status','published')->latest()->take($headline_no)->get();
        
        return view('frontend.index',compact('setting','cat_sec','partner','headline_news','headline_no'));
    }
    
    // public function contact(){
    //     $setting=SiteSetting::first();
        
    //     return view('frontend.contact',compact('setting'));
    // }
    // public function contact_us(Request $request){
    //     $message = new Message();
    //     $message->email = $request->email;
    //     $message->name = $request->name;
    //     $message->message = $request->message;
    //     $message->phone = $request->phone;
    //     $message->type=$request->type;
    //     $message->save();
    //     return back()->with('message','Message Send Successfully');


    // }
   
    
    public function layout(){
        if (Route::is('layout1')) {
            return view('frontend.layouts.layout1');
        } elseif(Route::is('layout2')){
            return view('frontend.layouts.layout2');
        }elseif(Route::is('layout3')){
            return view('frontend.layouts.layout3');
        }elseif(Route::is('layout4')){
            return view('frontend.layouts.layout4');
        }elseif(Route::is('layout5')){
            return view('frontend.layouts.layout5');
        }
    }

    public function single_news($slug){
        $setting=SiteSetting::first();
        $partner=Ad::first();
        $news=Post::where('slug',$slug)->first();
        // dd($news);
        return view('frontend.single-news',compact('news','setting','partner'));
    }
    public function news_category($slug){
        $cat=Category::where('slug',$slug)->first();
        $setting=SiteSetting::first();
        $partner=Ad::first();
        $news=Post::where('category',$cat->id)->where('status','published')->latest()->get();
        return view('frontend.news_category',compact('news','setting','partner','cat'));
    }
}
