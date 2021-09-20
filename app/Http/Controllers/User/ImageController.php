<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Gallery;
use App\Model\GalleryToImg;
use DB;

class ImageController extends Controller
{
    public function index(){
      $data['gallery']=Gallery::orderBy('id','desc')->get();
    	return view('user.image.gallery_list')->with($data);
    }


    public function add_page(){
      //$data['gallery']=Gallery::orderBy('id','desc')->get();
    	return view('user.image.image_add');
    }


    public function ins(Request $request){
    	//dd($request->all());

    	$chk=Gallery::where('name',$request->gallery)->first();
    	if($chk){
    			return back()->with('error','Gallery already added');
    	}else{
    		$ins_gallery=new Gallery();
			$ins_gallery->name=$request->gallery;
				
			$ins_gallery->save();

			$unique_id=$ins_gallery->id;

			 foreach ($request->images as $key => $value) {

                        $filename = time().'_'.$value->getClientOriginalName();
                        $destinationPath = "storage/app/public/images/";
                        $value->move($destinationPath, $filename);

                        $img=new GalleryToImg();
                        $img->galery_id=$unique_id;
                        $img->image=$filename;

                        $img->save();

			 }
			 return back()->with('success','Image added');

    	}
    }



    public function view($id){
    	$data['gallery']=Gallery::where('id',$id)->first();
    	$data['all_img']=GalleryToImg::where('galery_id',$id)->get();
    	return view('user.image.all_img')->with($data);
    }


    public function dlt($id){
    	 $unlnk=GalleryToImg::where('id',$id)->first();
            @$prev_img = $unlnk->image;
           
            if(@$prev_img){               
                @unlink('storage/app/public/images/'.$prev_img);
            }
    	
    	$galary_id=$unlnk->galery_id;

    	$cunt=GalleryToImg::where('galery_id',$galary_id)->count();
    	//dd($cunt);
    	if($cunt==1){
    		$dlt=GalleryToImg::where('id',$id)->delete();
    		$d=Gallery::where('id',$galary_id)->delete();
    		return redirect()->route('img.view')->with('success','deleted');
    	}else{
    	$dlt=GalleryToImg::where('id',$id)->delete();
    	return back()->with('success','deleted');
        }
    }







}
