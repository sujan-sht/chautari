<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    public function index(){
        $menus=Menu::all();
        return view('admin.settings.menu_setting',compact('menus'));
    }

    public function create(){
        $categories=Category::where('status',1)->get();
        $pages=Page::all();
        return view('admin.settings.menu_create',compact('categories','pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu' => 'required',
            'menu_order'=>'required|unique:menus',
            'menu_type'=>'required'
        ]);
        $menu =new Menu();
        $menu->menu=$request->menu;
        $menu->menu_order=$request->menu_order;
        $menu->menu_type=$request->menu_type;
        $menu->save();
        return redirect()->route('menu_settings')->with('message','Menu has been added successfully');
    }

    public function edit($id)
    {
        $categories=Category::where('status',1)->get();
        $pages=Page::all();
        $myMenu = Menu::findOrFail($id);
        return view('admin.settings.menu_edit',compact('myMenu','categories','pages'));
        
    }

    public function update(Request $request, $id)
    {
        $menu =Menu::findOrFail($id);
        $validated = $request->validate([
            'menu' => 'required',
            'menu_order'=>'required|unique:menus,menu_order,'.$id,
            'menu_type'=>'required'
        ]);
        
        $menu->menu=$request->menu;
        $menu->menu_order=$request->menu_order;
        $menu->menu_type=$request->menu_type;
        
        $menu->update();
        return redirect()->route('menu_settings')->with('message','Menu has been updated successfully');

    }

    public function destroy($id)
    {
        $post = Menu::findOrFail($id);
        $post->delete();
        return back()->with('message','Menu has been deleted successfully');
    }
    public function get_menu_items(Request $request){
        if ($request->type == 'category') {
            $categories=Category::where('status',1)->get();
            return $categories;
        } else {
           $pages=Page::get();
           return $pages;
        }
        
    }
}
