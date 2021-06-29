<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BoloController extends Controller
{

    public function addCategory(){
        return view('posts.add_category');
    }

    public function storeCategory(Request $request){

          $validate= $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

      $data=array();
      $data['name']=$request->name;
      $data['slug']=$request->slug;

      $category=DB::table('categories')->insert($data);

      if($category){
        $notification=array(
            'message'=>'successfully category inserted',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);
      }else{
        $notification=array(
            'message'=>'something went wrong',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
      //return response()->json($data);
      //echo "<pre>";
      //print_r ($data);
    }
}
