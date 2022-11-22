<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);
        $page->name = $request->title;
        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            $page->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->content = $request->content;
            $page->meta_title = $request->meta_title;
            $page->meta_description = $request->meta_description;
            // $page->keywords = $request->keywords;

            if ($request->hasFile('meta_image')) {
                $imageName = time().'.'.$request->meta_image->extension();  
         
                $request->meta_image->move(public_path('uploads/custom-pages/'), $imageName);
                $page->meta_image= $imageName;
                // $blog->image = $request->image->store('uploads/blogs');
            }

            $page->save();

            return redirect()->route('pages.index')->with('message','New page has been created successfully');
        }

        return redirect()->route('pages.create')->with('warning','Slug has been already used');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::where('slug', $id)->first();
        if($page != null){
            return view('admin.pages.edit', compact('page'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $page = Page::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);
        $page->name = $request->title;
        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() != null) {
            $page->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->content = $request->content;
            $page->meta_title = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->keywords = $request->keywords;

            if ($image = $request->file('meta_image')) {
                $image_path = public_path('uploads/custom-pages/' . $page->meta_image);
                
                if(is_file($image_path)){
                    unlink($image_path);
                }
                    $destinationPath = 'uploads/custom-pages/';
                    $profileImage = time() . "." .$image->extension();
                    $image->move($destinationPath, $profileImage);
                    $page->meta_image = "$profileImage";
                
            }else{
                unset($page->meta_image);
            }

            $page->save();

            return redirect()->route('pages.index')->with('message','Page has been successfully updated');
        }

        return redirect()->route('pages.edit')->with('warning','Slug has been used already');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::findOrFail($id);
        // $image_path = public_path('uploads/custom-pages/' . $page->meta_image);    
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }else{
                
        //     }
        $page->delete();
        return back()->with('message','Page deleted successfully');
    }

    public function show_custom_page($slug){
        $pages = Page::where('slug', $slug)->get();
        if($pages != null){
            return view('frontend.custom_page', compact('pages'));
        }
        abort(404);
    }
}
