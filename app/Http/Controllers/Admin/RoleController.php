<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use DB;

class RoleController extends Controller
{
    public function index(){
    	$data['roles']=Role::orderBy('id','desc')->get();
    	return view('admin.role.role_list')->with($data);
    }


    public function add_page(){
    	$data['per']=DB::table('permission')->orderBy('id')->get();
    	return view('admin.role.add_role')->with($data);

    }

    public function ins(Request $request){
     //dd($request->all());
    	$request->validate([
	      'per_id' => 'required',
	      'role' => 'required',
	      
	                                     
	    ]);
    	if($request->per_id){
    		foreach($request->per_id as $key=> $val){
               //already subject added or not
    			$chk=Role::where('role_name',$request->role)->where('permision_id',$val)->first();
    			if(!@$chk){
	    			$ins_plan=new Role();
	    			$ins_plan->role_name=$request->role;
	    			$ins_plan->permision_id=$val;
	    		
	    			$ins_plan->save();
    		    }
    		}

    		return back()->with('success','Role added');
    	}
    }




      public function dlt($id){
    	//dd($id);
    	$delete_plan=Role::where('id',$id)->first();
    	if($delete_plan){
    		Role::where('id',$id)->delete();
    		return back()->with('success','Role removed.');

    	}else{
    		return back()->with('error','Unauthorized access.!');
    	}
    }




    public function edit($id){
    	//dd($id);
    	$data['per']=DB::table('permission')->orderBy('id')->get();
    	$data['role']=Role::where('id',$id)->first();
    	if($data['role']){
    		return view('admin.role.edit_role')->with($data);

    	}else{
    		return back()->with('error','Unauthorized access.!');
    	}
    }








    public function upd(Request $request){
    		$request->validate([
            'role' => 'required',
            'per_id' => 'required'            
        ]);

    		$chk=Role::where('role_name',$request->role)->where('permision_id',$request->per_id)->where('id','!=',$request->id)->count();
    		if($chk>0){
    			return back()->with('error','Title already exists');
    		}

    
    		$upd=array(
    			'role_name'=>$request->role,
    			'permision_id'=>$request->per_id,
    		
    		);

    		Role::where('id',$request->id)->update($upd);
    		return back()->with('success','Updated');
    }







}
