<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Roles;

use App\Models\Users_roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard(){
      
        $checkrole = Users_roles::where('users_id','=',session(('LoggedUser')))->first();
        
                    if($checkrole->roles_id==1){

                        $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
                        return view('Advisor.dashboard',$data);

                 }elseif($checkrole->roles_id==2){
                     
                    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
                    return view('Client.dashboard',$data);

                 }
    }
     public function edit(){
        $checkrole = Users_roles::where('users_id','=',session('LoggedUser'))->first();
        if($checkrole->roles_id==1){
            $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
            return view('Advisor.Edit',$data);
        }elseif($checkrole->roles_id==2){
             $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
            return view('Client.Edit',$data);
     }
    }
     public function update(request $request){

            $request->validate([
                'name'=>'required |min:3',
            'email'=>'required|email',
            'mobile'=>'required|regex:/[7-9][0-9]{9}/',
            ]);

            $update = User::where('id','=',$request->clientId)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,

            ]);
            if($update){

                    return redirect()->back()->with('success','update user Successfully ');
            }else{
                return redirect()->back()->with('fail','something wrong try again ');
            }

            $checkrole = Users_roles::where('users_id','=',session('LoggedUser'))->first();
            
                $update = User::where('id','=',$request->clientId)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
    
                ]);
                if($update){
    
                        return redirect()->back()->with('success','update user Successfully ');
                }else{
                    return redirect()->back()->with('fail','something wrong try again ');
                } 
            

     }
    
}
