<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
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
        $sub_cat=SubCategory::orderBy('updated_at','desc')->get();
        return view('admin.subcategory.index',compact('sub_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->get();
        return view('admin.subcategory.create',compact('categories'));
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


        $category=new SubCategory();
        $category->name=$input['category'];
        $category->status=$input['status'];
        $category->parent_id=$input['parent_id'];
        $category->slug=$input['slug'];
        
        $category->save();

        // return redirect()->route('categories.index')->with(['message' => 'Category added successfully.']);
        return redirect()->route('sub-categories.index')->with('message','Sub Category added successfully');

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
        $categories=Category::where('status',1)->get();
        

        $sub_cat=SubCategory::where('slug',$id)->first();
        
        return view('admin.subcategory.edit',compact('sub_cat','categories'));
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
        $category= SubCategory::where('slug',$id)->first();
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
            Rule::unique('sub_categories')->ignore($id),
          ]);

          if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        

        // $category= SubCategory::where('slug',$id)->first();
        
        
        $category->name=$input['category'];

        $category->parent_id=$input['parent_id'];
        $category->status=$input['status'];
        $category->slug=$input['slug'];

       

        $category->update();
        return redirect()->route('sub-categories.index')->with('message','Sub Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=SubCategory::where('slug',$id)->first();
        
        $category->delete();
        return back()->with('message','Sub Category deleted successfully');
    }

    public function update_status(Request $request)
    {
        // dd('hello');
        $category = SubCategory::findOrFail($request->cat_id);
        // dd($category);
        $category->status = $request->status;
        // dd($category);
        $category->save();
    
        return response()->json(['message' => 'Status updated successfully.']);
    }

    public function sub_cat_by_category(Request $request)
    {
        $subcat = SubCategory::where('parent_id', $request->category_id)->get();
        return $subcat;
    }
}
