<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialSetting;

class SocialSettingsController extends Controller
{
    public function index(){
        $social = SocialSetting::first();
        if(empty($social)){
            $social = new SocialSetting();
            $social->facebook='https://www.facebook.com/';
            $social->twitter='https://www.twitter.com/';
            $social->instagram='https://www.instagram.com/';
            $social->youtube='https://www.youtube.com/';
            $social->save();

        }
        return view('admin.settings.social',compact('social'));
    }
    
    public function update(Request $request, $id)
    {
        $social = SocialSetting::findOrFail($id);
        $this->validateData($request);
        $social->facebook=$request->facebook;
        $social->twitter=$request->twitter;
        $social->instagram=$request->instagram;
        $social->youtube=$request->youtube;
        $social->map=$request->map;
        $social->update();
        return back()->with('message','Settings has been updated successfully');
    }

    // Validate Data
    protected function validateData(Request $request)
    {
     // return $request->validate([
        //     'facebook'=>'required',
        //     'twitter'=>'required',
        //     'instagram' => 'required',
        //     'linkedin'=> 'required'
        // ]);
    }
}
