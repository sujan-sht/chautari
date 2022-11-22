<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Page;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    public function index($slug){
        $page=Page::where('slug',$slug)->first();
        $setting=SiteSetting::first();
        $partner=Ad::first();
        if($page != null){
            return view('frontend.custom_page', compact('page','partner','setting'));
        }
        
    }
    public function sub_category($slug){
        $sub_cat=SubCategory::where('slug',$slug)->first();
        // dd($sub_cat);
        $setting=SiteSetting::first();
        $partner=Ad::first();
        $news=Post::where('category',$sub_cat->id)->latest()->get();
        return view('frontend.news_category',compact('news','setting','partner','sub_cat'));   
    }
}