<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $categories=Category::orderBy('updated_at','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories=Category::where('status',1)->get();
        
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        if ($request->slug != null) {
        $input['slug']=str_replace(' ', '-', $request->slug);

        }
        else {
        $input['slug']=str_replace(' ', '-', $request->category);

        }
        $validator = Validator::make($input,[
            'category' => 'required',
            'status'=>'required',
            'slug'=>'unique:categories',
          ]);

          if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $category=new Category();
        $category->name=$input['category'];
        $category->slug=$input['slug'];
        $category->status=$input['status'];
       
        $category->save();

        return redirect()->route('categories.index')->with(['message' => 'Category added successfully.']);

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
        // dd($id);

        $category=Category::where('slug',$id)->first();
        // dd($category);
        return view('admin.category.edit',compact('category'));
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
        // dd($id);
        $category= Category::where('slug',$id)->first();
        $id=$category->id;
        $input = $request->all();
        if ($request->slug != null) {
        $input['slug']=str_replace(' ', '-', $request->slug);

        }
        else {
        $input['slug']=str_replace(' ', '-', $request->category);

        }
        $validator = Validator::make($input,[
            'category' => 'required',
            'status'=>'required',
            // 'slug'=>'unique:categories',
            Rule::unique('categories')->ignore($id),
          ]);

          if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $category->name=$input['category'];
        $category->slug=$input['slug'];
        $category->status=$input['status'];
        
        $category->update();
        return redirect()->route('categories.index')->with('message','Category updated successfully');

    }

    public function update_status(Request $request)
    {
        // dd('hello');
        $category = Category::findOrFail($request->cat_id);
        // dd($category);
        $category->status = $request->status;
        // dd($category);
        $category->save();
    
        return response()->json(['message' => 'Status updated successfully.']);
    }

    // public function update_feature(Request $request)
    // {
    //     $feature = Category::findOrFail($request->cat_id);
    //     // dd($category);
    //     $feature->featured = $request->featured;
    //     // dd($category);
    //     $feature->save();
    
    //     return response()->json(['message' => 'Featured updated successfully.']);
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $category=Category::where('slug',$id)->first();
        
        // $image_path = public_path('category/' . $category->image);    
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }else{
                
        //     }
        // dd($category->id);
        $sub_cat=SubCategory::where('parent_id',$category->id)->first();
        if($sub_cat!=null){

            $sub_cat->delete();
        }
        $category->delete();
        // dd($sub_cat);
        return back()->with('message','Category deleted successfully');
    }
}
