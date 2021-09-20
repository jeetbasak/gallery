<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    

    public function index(){
      $data['users']=User::orderBy('id','desc')->where('user_type','U')->get();
      return view('admin.user.user_list')->with($data);
    }


    public function active($id){  
     $actv=User::where('id',$id)->update(['status'=>'A']);
     return back()->with('success','User activated');
    }


     public function inactive($id){  
     	//dd("j");
     $actv=User::where('id',$id)->update(['status'=>'I']);
     return back()->with('success','User inactivated');
    }

    


    public function add_page(Request $req){
    	
    	$data['role']=Role::orderBy('id')->get();
    	return view('admin.user.user_add')->with($data);
    }



    public function u_ins(Request $request){
    	$request->validate([
	      'name' => 'required',
	      'email' => 'required',
	      
	                                     
	    ]);

               //already subject added or not
    			$chk=User::where('email',$request->email)->first();
    			if($chk){
    				return back()->with('error','Email exists');
    			}

    			else{
	    			$ins_user=new User();
	    			$ins_user->name=$request->name;
	    			$ins_user->email=$request->email;
	    			$ins_user->password=Hash::make($request->password);
	    			$ins_user->user_type='U';
	    			$ins_user->role=$request->role;
	    		
	    			$ins_user->save();
	    			return back()->with('success','user added');
    		    }
    		}






      public function edit($id){  
     	//dd("j");
     $data['role']=Role::orderBy('id')->get();
     $data['user']=User::Where('id',$id)->first();
     return view('admin.user.user_edit')->with($data);
    }





    public function upd(Request $request){
    	$request->validate([
            'name' => 'required',
            'email' => 'required'            
        ]);

        	$chk=User::where('email',$request->email)->where('id','!=',$request->id)->first();
    			if($chk){
    				return back()->with('error','Email exists');
    			}

    		

    
    		$upd=array(
    			'name'=>$request->name,
    			'email'=>$request->email,
    			'role'=>$request->role,
    		
    		);

    		User::where('id',$request->id)->update($upd);
    		return back()->with('success','User Updated');

    }
    		
    
}
