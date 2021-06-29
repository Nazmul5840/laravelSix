<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HelloController extends Controller
{
   public function contact(){
    return view("pages.contact");
   }

   public function about(){
    return view('pages.about');
   }

   public function allCategory(){
    
      $category=DB::table('categories')->get();
      
      return view('posts.all_category',compact('category'));
   }

   public function viewCategory($id){
     $category=DB::table('categories')->where('id',$id)->first();
      //return view('posts.categoryView')->with('category',$category);
     return view('posts.categoryView',compact('category'));

     //echo "<pre>";
     //print_r($category);
   }

   public function deleteCategory($id){
      $delete=DB::table('categories')->where('id',$id)->delete();
        $notification=array(
            'message'=>'successfully category Deleted',
            'alert-type'=>'success'
        );
      return Redirect()->back();
   }

   public function editCategory($id){
      //echo $id;
      $category=DB::table('categories')->where('id',$id)->first();
      return view('posts.editCategory',compact('category'));
   }

   public function updateCategory(Request $request, $id){

       $validated = $request->validate([
         'name' => 'required|max:50|min:4',
         'slug' => 'required|max:50|min:4',
       ]);

      $data=array();
      $data['name']=$request->name;
      $data['slug']=$request->slug;

      $category=DB::table('categories')->where('id',$id)->update($data);

      return Redirect()->route('all.category');
   }

   public function index(){
    $post=DB::table('posts')
        ->join('categories','posts.categoryId','categories.id')
        ->select('posts.*','categories.name','categories.slug')->simplePaginate(3);

    return view('pages.index',compact('post'));
    //echo '<pre>';
    //print_r($post);
   }

}
