<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getapp(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'bookingDate'=>'required',
            'noPerson'=>'required|numeric|gt:0|lt:11',
            'advisorId'=>'required|numeric',
            'mobile' => 'required|regex:/^[7-9][0-9]{9}$/'
        ],[
            'advisorId.numeric'=>"Please Select Advisor ",
            'bookingDate.required'=>'Please select Appointment Date ',
        ]);
        // dd($request->input());

        $create = Appointment::create($request->input());
        if($create){
            return redirect('appointment')->with('success','Your appointment successfully schedule now you can check Appointment status ');
        }else{
            return redirect('appointment')->with('fail',' Something wrong please try again ');
        }

    }
}
