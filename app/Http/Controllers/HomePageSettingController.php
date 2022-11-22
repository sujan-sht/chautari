<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\CategorySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomePageSettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:section_layout-show|section_layout-create|section_layout-edit|section_layout-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:section_layout-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:section_layout-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:section_layout-delete', ['only' => ['destroy']]);

    }
    public function index()
    {
        $cat_section= CategorySection::orderBy('section_order', 'asc')->get();
        return view('admin.homepagesetting.index',compact('cat_section'));
    }
    public function create()
    {
        $categories= Category::where('status',1)->get();
        return view('admin.homepagesetting.create',compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'category'=>'required',
            'status'=>'required',
            'layout'=>'required',
            'order'=>'required'
        ]);
        $cat_section=new CategorySection();
        $cat_section->category_id=$request->category;
        $cat_section->subcat_id=json_encode($request->sub_category);
       
        if ($request->hasFile('category_partner')) {
            
            $imageName = time().'.'.$request->category_partner->extension();  
            $request->category_partner->move(public_path('uploads/partners/category_partner/'), $imageName);
           
        }
        // dd($imageName);
        $data = [
            'url' => $request->category_partner_url,
            'img' => $imageName
        ];
        // dd(json_encode($data));
        $cat_section->category_partner=json_encode($data);
        
        $cat_section->status=$request->status;
        $cat_section->section_order=$request->order;
        $cat_section->layout=$request->layout;
        // $data=[];
        // if ($request->hasFile('section')) {
        //     foreach($request->file('section') as $key => $file)
        //     {
        //         $name = time(). $key. '.'.$file->extension();
        //         $file->move(public_path().'/uploads/partners/sidebarAds', $name);  
        //         array_push($data,$name);  
        //     }
        // }
        // // dd($data);
        // $cat_section->sidebar_partners=json_encode($data);
        // dd($cat_section);
        if ($request->hasFile('section1')) {
            
            $imageName = 'section1'.time().'.'.$request->section1->extension();  
            
            $request->section1->move(public_path().'/uploads/partners/sidebarAds', $imageName);
           
        }
        $data = [
            'url' => $request->section1_url,
            'img' => $imageName
        ];
        $cat_section->section1=json_encode($data);
        

        if ($request->hasFile('section2')) {
            
            $imageName = 'section2'.time().'.'.$request->section2->extension();  
            $request->section2->move(public_path().'/uploads/partners/sidebarAds', $imageName);
           
        }
        $data = [
            'url' => $request->section2_url,
            'img' => $imageName
        ];
        $cat_section->section2=json_encode($data);

        if ($request->hasFile('section3')) {
            
            $imageName = 'section3'.time().'.'.$request->section3->extension();  
            $request->section3->move(public_path().'/uploads/partners/sidebarAds', $imageName);
           
        }
        $data = [
            'url' => $request->section3_url,
            'img' => $imageName
        ];
        $cat_section->section3=json_encode($data);

        $cat_section->save();
        return redirect()->route('homepageSetting.index')->with('message','Category Section added successfully');   

    }
    public function edit($id)
    {
        $cat_section=CategorySection::findOrFail($id);
        $categories= Category::where('status',1)->get();
        return view('admin.homepagesetting.edit',compact('categories','cat_section'));
    }
    public function update(Request $request,$id)
    {
        $cat_section=CategorySection::findOrFail($id);
        $validated = $request->validate([
            'category'=>'required',
            'status'=>'required',
            'layout'=>'required',
            'order'=>'required|unique:category_sections,section_order,'.$cat_section->id
        ]);
        $cat_section->category_id=$request->category;
        $cat_section->subcat_id=json_encode($request->sub_category);
        $cat_section->status=$request->status;
        $cat_section->layout=$request->layout;
        $cat_section->section_order=$request->order;
        

        if ($request->hasFile('category_partner')) {
            if ($request->previous_category_partners != null) {
                // dd($request->previous_category_partners);
                $featured = public_path('uploads/partners/category_partner/' . $request->previous_category_partners); 
                if(file_exists($featured)){
                    unlink($featured);
                    
                } 
                $imageName = time().'.'.$request->category_partner->extension();  
                $request->category_partner->move(public_path('uploads/partners/category_partner/'), $imageName);
                // $ad->category_partner= $imageName;  
                
            } else{
                $imageName = time().'.'.$request->category_partner->extension();  
                $request->category_partner->move(public_path('uploads/partners/category_partner/'), $imageName);
            } 
        }else {
            $imageName=$request->previous_category_partners;
           
        }
        // dd($imageName);
        $data = [
            'url' => $request->category_partner_url,
            'img' => $imageName
        ];
        // dd(json_encode($data));
        $cat_section->category_partner=json_encode($data);


        // if ($request->has('previous_photos')) {
        //     $data = $request->previous_photos;
        // }
        // else{
        //     $data = array();
        // }
        // if ($request->hasFile('section')) {
        //     foreach($request->file('section') as $key => $file)
        //     {
        //         $name = time(). $key . '.'.$file->extension();
        //         $file->move(public_path().'/uploads/partners/sidebarAds', $name);  
        //         array_push($data,$name);  
        //     }
        // }
        // $cat_section->sidebar_partners=json_encode($data);
        if ($request->hasFile('section1')) {
            if ($request->section1 != null) {
                // dd($request->section1);
                $featured = public_path('uploads/partners/sidebarAds/' . $request->section1); 
                if(file_exists($featured)){
                    unlink($featured);
                    
                } 
                $imageName = 'section1'.time().'.'.$request->section1->extension();  
                $request->section1->move(public_path('uploads/partners/sidebarAds/'), $imageName);
                // $ad->sidebarAds= $imageName;  
                
            } else{
                $imageName = 'section1'.time().'.'.$request->section1->extension();  
                $request->section1->move(public_path('uploads/partners/sidebarAds/'), $imageName);
            } 
        }else {
            $imageName=$request->section1;
           
        }
        // dd($imageName);
        $data = [
            'url' => $request->section1_url,
            'img' => $imageName
        ];
        // dd(json_encode($data));
        $cat_section->section1=json_encode($data);

        if ($request->hasFile('section2')) {
            if ($request->section2 != null) {
                // dd($request->section2);
                $featured = public_path('uploads/partners/sidebarAds/' . $request->section2); 
                if(file_exists($featured)){
                    unlink($featured);
                    
                } 
                $imageName = 'section2'.time().'.'.$request->section2->extension();  
                $request->section2->move(public_path('uploads/partners/sidebarAds/'), $imageName);
                // $ad->sidebarAds= $imageName;  
                
            } else{
                $imageName = 'section2'.time().'.'.$request->section2->extension();  
                $request->section2->move(public_path('uploads/partners/sidebarAds/'), $imageName);
            } 
        }else {
            $imageName=$request->section2;
           
        }
        // dd($imageName);
        $data = [
            'url' => $request->section2_url,
            'img' => $imageName
        ];
        // dd(json_encode($data));
        $cat_section->section2=json_encode($data);

        if ($request->hasFile('section3')) {
            if ($request->section3 != null) {
                // dd($request->section3);
                $featured = public_path('uploads/partners/sidebarAds/' . $request->section3); 
                if(file_exists($featured)){
                    unlink($featured);
                    
                } 
                $imageName = 'section3'.time().'.'.$request->section3->extension();  
                $request->section3->move(public_path('uploads/partners/sidebarAds/'), $imageName);
                // $ad->sidebarAds= $imageName;  
                
            } else{
                $imageName = 'section3'.time().'.'.$request->section3->extension();  
                $request->section3->move(public_path('uploads/partners/sidebarAds/'), $imageName);
            } 
        }else {
            $imageName=$request->section3;
           
        }
        // dd($imageName);
        $data = [
            'url' => $request->section3_url,
            'img' => $imageName
        ];
        // dd(json_encode($data));
        $cat_section->section3=json_encode($data);
        $cat_section->update();
        return redirect()->route('homepageSetting.index')->with('message','Category Section updated successfully');   
        
    }
    public function destroy($id){
        $cat_section=CategorySection::findOrFail(decrypt($id));
        // dd($cat_section);
        if($cat_section->category_partner != null){
            $featured = public_path('uploads/partners/category_partner/' . $cat_section->category_partner); 
            if(file_exists($featured)){
                unlink($featured);
            } 
        }
        if($cat_section->sidebar_partners != null){
            foreach (json_decode($cat_section->sidebar_partners) as $key => $value) {
                $featured = public_path('uploads/partners/sidebarAds/' . $value); 
                if(file_exists($featured)){
                    unlink($featured);
                } 
            }
        }
        
        
        
        $cat_section->delete();
        return back()->with('message','Category Section deleted successfully');   

    }
    public function update_status(Request $request)
    {
        // dd('hello');
        $category = CategorySection::findOrFail($request->cat_id);
        // dd($category);
        $category->status = $request->status;
        // dd($category);
        $category->save();
    
        return response()->json(['message' => 'Status updated successfully.']);
    }





    public function ad()
    {
        if (Route::is('homepageAd')) {
            $ads = Ad::first();
            if(empty($ads)){
                $ads=new Ad();
                $ads->id = 1;
                $ads->save();
            }
            return view('admin.ads.homepage',compact('ads'));
        } elseif(Route::is('singleNewsAd')){
            $ads = Ad::first();
            if(empty($ads)){
                $ads=new Ad();
                $ads->id = 1;
                $ads->save();
            }
            return view('admin.ads.singleNews',compact('ads'));
        } elseif(Route::is('categoryAd')){
            $ads = Ad::first();
            if(empty($ads)){
                $ads=new Ad();
                $ads->id = 1;
                $ads->save();
            }
            return view('admin.ads.category',compact('ads'));
        } 
    }

    public function adStore(Request $request,$id){
        if (Route::is('homepageAd.store')) {
            $ad=Ad::find(decrypt($id));
            if ($request->hasFile('before_header')) {
                if ($request->previous_header != null) {
                    // dd($request->previous_header);
                    $featured = public_path('uploads/partners/before_header/' . $request->previous_header); 
                    if(file_exists($featured)){
                        unlink($featured);
                        
                    } 
                    $imageName = time().'.'.$request->before_header->extension();  
                    $request->before_header->move(public_path('uploads/partners/before_header/'), $imageName);
                    // $ad->before_header= $imageName;  
                    
                } else{
                    $imageName = time().'.'.$request->before_header->extension();  
                    $request->before_header->move(public_path('uploads/partners/before_header/'), $imageName);
                } 
            }else {
                $imageName=$request->previous_header;
               
            }
            // dd($imageName);
            $data = [
                'url' => $request->before_header_url,
                'img' => $imageName
            ];
            $ad->before_header=json_encode($data);
            
            if ($request->hasFile('before_footer')) {
                if ($request->previous_footer != null) {
                    $feature = public_path('uploads/partners/before_footer/' . $request->previous_footer); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = time().'.'.$request->before_footer->extension();  
                    $request->before_footer->move(public_path('uploads/partners/before_footer/'), $imageName); 
                }  else{
                    $imageName = time().'.'.$request->before_footer->extension();  
                    $request->before_footer->move(public_path('uploads/partners/before_footer/'), $imageName);
                }
            } else{
                $imageName=$request->previous_footer;
            }
            $data = [
                'url' => $request->before_footer_url,
                'img' => $imageName
            ];
            $ad->before_footer=json_encode($data);

            if ($request->hasFile('after_header1')) {
                if ($request->after_header1 != null) {
                    $feature = public_path('uploads/partners/after_header/' . $request->after_header1); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = 'after_header1'.time().'.'.$request->after_header1->extension();  
                    $request->after_header1->move(public_path('uploads/partners/after_header/'), $imageName); 
                }  else{
                    $imageName = 'after_header1'.time().'.'.$request->after_header1->extension();  
                    $request->after_header1->move(public_path('uploads/partners/after_header/'), $imageName);
                }
            } else{
                $imageName=$request->after_header1;
            }
            $data = [
                'url' => $request->after_header1_url,
                'img' => $imageName
            ];
            $ad->after_header1=json_encode($data);

            if ($request->hasFile('after_header2')) {
                if ($request->after_header2 != null) {
                    $feature = public_path('uploads/partners/after_header/' . $request->after_header2); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = 'after_header2'.time().'.'.$request->after_header2->extension();  
                    $request->after_header2->move(public_path('uploads/partners/after_header/'), $imageName); 
                }  else{
                    $imageName = 'after_header2'.time().'.'.$request->after_header2->extension();  
                    $request->after_header2->move(public_path('uploads/partners/after_header/'), $imageName);
                }
            } else{
                $imageName=$request->after_header2;
            }
            $data = [
                'url' => $request->after_header2_url,
                'img' => $imageName
            ];
            $ad->after_header2=json_encode($data);

            if ($request->hasFile('after_header3')) {
                if ($request->after_header3 != null) {
                    $feature = public_path('uploads/partners/after_header/' . $request->after_header3); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = 'after_header3'.time().'.'.$request->after_header3->extension();  
                    $request->after_header3->move(public_path('uploads/partners/after_header/'), $imageName); 
                }  else{
                    $imageName = 'after_header3'.time().'.'.$request->after_header3->extension();  
                    $request->after_header3->move(public_path('uploads/partners/after_header/'), $imageName);
                }
            } else{
                $imageName=$request->after_header3;
            }
            $data = [
                'url' => $request->after_header3_url,
                'img' => $imageName
            ];
            $ad->after_header3=json_encode($data);

            // if ($request->has('previous_after')) {
                
            //     // $data=json_decode($ad->after_header);
            //     // dd(json_decode($data));
            //     $data = $request->previous_after;
            // }
            // else{
            //     $data = array();
            // }
            // if ($request->hasFile('after_header')) {
            //     foreach($request->file('after_header') as $key => $file)
            //     {
            //         $name = time(). $key . '.'.$file->extension();
            //         $file->move(public_path().'/uploads/partners/after_header/', $name);  
                    
            //         array_push($data,$name);  

            //         // $a=[
            //         //     'id'=>$key,
            //         //     'url'=>$request->after_header_url,
            //         //     'img'=>$name
            //         // ];
            //         // array_push($data,$a);  

            //         // $ad->after_header=json_encode($data);
            //     }
            // }
            // // dd(json_decode($ad->after_header)[0]->img);
            // $ad->after_header=json_encode($data);
            // $urls=[
            //     'url1'=>$request->after_header_url1,
            //     'url2'=>$request->after_header_url2,
            //     'url3'=>$request->after_header_url3
            // ];
            // $ad->after_header_url=json_encode($urls);
            $ad->update();
            return back()->with('message','Ad added successfully');
            
        } elseif(Route::is('singleNewsAd.store')){

            $ad=Ad::find(decrypt($id));
            // if ($request->hasFile('single_news')) {
            //     if ($request->previous_single_news != null) {
            //         $data = $request->previous_single_news;
            //         $feature = public_path('uploads/partners/single_news/' . $request->previous_single_news); 
            //         if(file_exists($feature)){
            //             unlink($feature);
                        
            //         } 
                    
            //         $imageName = time().'.'.$request->single_news->extension();  
            //         $request->single_news->move(public_path('uploads/partners/single_news/'), $imageName);
            //         // $ad->single_news= $imageName;  
            //     }  
            //     else {
            //         $imageName = time().'.'.$request->single_news->extension();  
            //         $request->single_news->move(public_path('uploads/partners/single_news/'), $imageName);
            //     }
            //     $data = [
            //         'url' => $request->before_header_url,
            //         'img' => $imageName
            //     ];
            //     // dd(json_encode($data));
            //     $ad->before_header=json_encode($data);
            // }

            if ($request->hasFile('single_news')) {
                if ($request->previous_single_news != null) {
                    // dd($request->previous_single_news);
                    $featured = public_path('uploads/partners/single_news/' . $request->previous_single_news); 
                    if(file_exists($featured)){
                        unlink($featured);
                        
                    } 
                    $imageName = time().'.'.$request->single_news->extension();  
                    $request->single_news->move(public_path('uploads/partners/single_news/'), $imageName);
                    // $ad->single_news= $imageName;  
                    
                } else{
                    $imageName = time().'.'.$request->single_news->extension();  
                    $request->single_news->move(public_path('uploads/partners/single_news/'), $imageName);
                } 
            }else {
                $imageName=$request->previous_single_news;
               
            }
            // dd($imageName);
            $data = [
                'url' => $request->single_news_url,
                'img' => $imageName
            ];
            // dd(json_encode($data));
            $ad->single_news=json_encode($data);


            

            if ($request->hasFile('after_single_headline')) {
                if ($request->previous_after_single_headline != null) {
                    // dd($request->previous_after_single_headline);
                    $featured = public_path('uploads/partners/after_single_headline/' . $request->previous_after_single_headline); 
                    if(file_exists($featured)){
                        unlink($featured);
                        
                    } 
                    $imageName = time().'.'.$request->after_single_headline->extension();  
                    $request->after_single_headline->move(public_path('uploads/partners/after_single_headline/'), $imageName);
                    // $ad->after_single_headline= $imageName;  
                    
                } else{
                    $imageName = time().'.'.$request->after_single_headline->extension();  
                    $request->after_single_headline->move(public_path('uploads/partners/after_single_headline/'), $imageName);
                } 
            }else {
                $imageName=$request->previous_after_single_headline;
               
            }
            // dd($imageName);
            $data = [
                'url' => $request->after_single_headline_url,
                'img' => $imageName
            ];
            // dd(json_encode($data));
            $ad->after_single_headline=json_encode($data);

            

            if ($request->hasFile('single_after_header')) {
                if ($request->previous_single_after_header != null) {
                    // dd($request->previous_single_after_header);
                    $featured = public_path('uploads/partners/single_after_header/' . $request->previous_single_after_header); 
                    if(file_exists($featured)){
                        unlink($featured);
                        
                    } 
                    $imageName = time().'.'.$request->single_after_header->extension();  
                    $request->single_after_header->move(public_path('uploads/partners/single_after_header/'), $imageName);
                    // $ad->single_after_header= $imageName;  
                    
                } else{
                    $imageName = time().'.'.$request->single_after_header->extension();  
                    $request->single_after_header->move(public_path('uploads/partners/single_after_header/'), $imageName);
                } 
            }else {
                $imageName=$request->previous_single_after_header;
               
            }
            // dd($imageName);
            $data = [
                'url' => $request->single_after_header_url,
                'img' => $imageName
            ];
            // dd(json_encode($data));
            $ad->single_after_header=json_encode($data);

            // if ($request->has('previous_single_sidebar')) {
            //     $data = $request->previous_single_sidebar;
            // }
            // else{
            //     $data = array();
            // }
            // if ($request->hasFile('single_sidebar')) {
            //     foreach($request->file('single_sidebar') as $key => $file)
            //     {
            //         $name = time(). $key . '.'.$file->extension();
            //         $file->move(public_path().'/uploads/partners/single_sidebar/', $name);  
            //         array_push($data,$name);  
            //     }
            // }
            // $ad->single_sidebar=json_encode($data);
            if ($request->hasFile('single_sidebar1')) {
                if ($request->single_sidebar1 != null) {
                    $feature = public_path('uploads/partners/single_sidebar/' . $request->single_sidebar1); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = 'single_sidebar1'.time().'.'.$request->single_sidebar1->extension();  
                    $request->single_sidebar1->move(public_path('uploads/partners/single_sidebar/'), $imageName); 
                }  else{
                    $imageName = 'single_sidebar1'.time().'.'.$request->single_sidebar1->extension();  
                    $request->single_sidebar1->move(public_path('uploads/partners/single_sidebar/'), $imageName);
                }
            } else{
                $imageName=$request->single_sidebar1;
            }
            $data = [
                'url' => $request->single_sidebar1_url,
                'img' => $imageName
            ];
            $ad->single_sidebar1=json_encode($data);

            if ($request->hasFile('single_sidebar2')) {
                if ($request->single_sidebar2 != null) {
                    $feature = public_path('uploads/partners/single_sidebar/' . $request->single_sidebar2); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = 'single_sidebar2'.time().'.'.$request->single_sidebar2->extension();  
                    $request->single_sidebar2->move(public_path('uploads/partners/single_sidebar/'), $imageName); 
                }  else{
                    $imageName = 'single_sidebar2'.time().'.'.$request->single_sidebar2->extension();  
                    $request->single_sidebar2->move(public_path('uploads/partners/single_sidebar/'), $imageName);
                }
            } else{
                $imageName=$request->single_sidebar2;
            }
            $data = [
                'url' => $request->single_sidebar2_url,
                'img' => $imageName
            ];
            $ad->single_sidebar2=json_encode($data);

            if ($request->hasFile('single_sidebar3')) {
                if ($request->single_sidebar3 != null) {
                    $feature = public_path('uploads/partners/single_sidebar/' . $request->single_sidebar3); 
                    if(file_exists($feature)){
                        unlink($feature);
                        
                    } 
                    $imageName = 'single_sidebar3'.time().'.'.$request->single_sidebar3->extension();  
                    $request->single_sidebar3->move(public_path('uploads/partners/single_sidebar/'), $imageName); 
                }  else{
                    $imageName = 'single_sidebar3'.time().'.'.$request->single_sidebar3->extension();  
                    $request->single_sidebar3->move(public_path('uploads/partners/single_sidebar/'), $imageName);
                }
            } else{
                $imageName=$request->single_sidebar3;
            }
            $data = [
                'url' => $request->single_sidebar3_url,
                'img' => $imageName
            ];
            $ad->single_sidebar3=json_encode($data);

            $ad->update();
            return back()->with('message','Ad added successfully');
        } elseif(Route::is('categoryAd.store')){
            $ad=Ad::find(decrypt($id));
            
            if ($request->hasFile('category_page')) {
                if ($request->previous_category_page != null) {
                    // dd($request->previous_category_page);
                    $featured = public_path('uploads/partners/category_page/' . $request->previous_category_page); 
                    if(file_exists($featured)){
                        unlink($featured);
                        
                    } 
                    $imageName = time().'.'.$request->category_page->extension();  
                    $request->category_page->move(public_path('uploads/partners/category_page/'), $imageName);
                    // $ad->category_page= $imageName;  
                    
                } else{
                    $imageName = time().'.'.$request->category_page->extension();  
                    $request->category_page->move(public_path('uploads/partners/category_page/'), $imageName);
                } 
            }else {
                $imageName=$request->previous_category_page;
               
            }
            // dd($imageName);
            $data = [
                'url' => $request->category_page_url,
                'img' => $imageName
            ];
            // dd(json_encode($data));
            $ad->category_page=json_encode($data);
            $ad->update();
            return back()->with('message','Ad added successfully');
            
        }
    }
    
}
