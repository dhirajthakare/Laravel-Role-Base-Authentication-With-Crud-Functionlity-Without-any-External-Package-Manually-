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
    public function appointment(){
      
        $checkrole = Users_roles::where('users_id','=',session(('LoggedUser')))->first();
                    if($checkrole->roles_id==1){

                    //     $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
                    //  return view('Advisor.appointment',$data);
                    return redirect()->back();

                 }elseif($checkrole->roles_id==2){
                    $role = Roles::where('name','=','Advisor')->with('advisors')->get();
                    // dd($role);
                    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
                    return view('Client.appointment',compact('role'),$data);

                 }
    }
    public function appointmentInfo(){
      
        $checkrole = Users_roles::where('users_id','=',session(('LoggedUser')))->first();
                    if($checkrole->roles_id==1){
                    //    return redirect()->back();

                    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
                    // dd($data);
                    $appointments = Appointment::where('advisorId','=',$data['LoggedUserInfo']->id)->get();
                    
                    return view('Advisor.appointment',compact('appointments'),$data);

                 }elseif($checkrole->roles_id==2){
                    $data = ['LoggedUserInfo'=>User::where('id','=',session('LoggedUser'))->first()];
                    $appointments = Appointment::where('clientId','=',$data['LoggedUserInfo']->id)->with('Advisor')->get();
                    // dd($appointments);
                    return view('Client.appointmentInfo',compact('appointments'),$data);

                 }
    }
    public function delete($id){

        $checkrole = Users_roles::where('users_id','=',session(('LoggedUser')))->first();
        if($checkrole->roles_id==2){

            $delete =Appointment::where('id',$id)->delete();
            if($delete){
                return redirect('appointmentInfo')->with('success',' Your Appointment Deleted ');
            }else {
                return redirect('appointmentInfo')->with('fail',' Somthing wrong ');
            }
        }else {
            return back();
        }
       

    }

    // composer require barryvdh/laravel-debugbar --dev
    public function update(Request $request){

        $user = Appointment::where('id','=',$request->token)->update(['status'=>$request->status]);
        if($user){
            return redirect('appointmentInfo')->with('success','Client status change');
        }else{
            return redirect('appointmentInfo')->with('fail','Something wrong try again');
        }
    }
}
