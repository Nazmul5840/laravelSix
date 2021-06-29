<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
     public function posts(){
        $category=DB::table('categories')->get();
        return view('posts.writepost',compact('category'));
    }

    public function storePost(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:125|min:4',
            'details' => 'required|min:20',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['categoryId']=$request->category_id;
        $data['details']=$request->details;
        
        $image=$request->file('image');
        if($image){
           $image_name=hexdec(uniqid());
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.".".$ext;
           $image_path='public/frontend/assets/post_image/';
           $upload_url=$image_path.$image_full_name;
           $success=$image->move($image_path,$image_full_name);
           $data['image']=$upload_url;
           DB::table('posts')->insert($data);
           $notification=array(
                'message'=>'successfully post inserted',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'successfully post inserted',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        } 
    }

    public function allPost(){
        //$post=DB::table('posts')->get();

        $post=DB::table('posts')
        ->join('categories','posts.categoryId','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->get();

        return view('posts.allpost',compact('post'));
    }

    public function viewPost($id){
        $post=DB::table('posts')
            ->join('categories','posts.categoryId','categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id',$id)
            ->first();

            //echo "<pre>";
            //print_r($post);

            return view('posts.postView',compact('post'));
    }

    public function postDelete($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        //echo "<pre>";
       // print_r($post);

        $delete=DB::table('posts')->where('id',$id)->delete();
        if($delete){
            unlink($image);
            return Redirect()->back();
        }else{
            return Redirect()->back();
        }

    }

    public function postEdit($id){
        $category=DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();

        return view('posts.postEdit', compact('category','post'));
    }

    public function updatePost(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|max:125|min:4',
            'details' => 'required|min:20',
            'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['categoryId']=$request->category_id;
        $data['details']=$request->details;

        $image=$request->file('image');
        if($image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_fullname=$image_name.".".$ext;
            $image_path="public/frontend/assets/post_image/";
            $image_url=$image_path.$image_fullname;
            $success=$image->move($image_path,$image_fullname);

            $data['image']=$image_url;
            unlink($request->old_image);
            DB::table('posts')->where('id',$id)->update($data);
            return Redirect()->route('allPost');
        }else{
           $data['image']=$request->old_image;
           DB::table('posts')->where('id',$id)->update($data);
           return Redirect()->route('allPost'); 
        }
    }

    public function viewDetails($id){
        $post=DB::table('posts')->where('id',$id)->first();

        return view('posts.viewDetails',compact('post'));    
    }
}
