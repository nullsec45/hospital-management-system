<?php

namespace App\Http\Controllers;

use App\Models\{User, Appointment, Doctor};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype == "0"){
                $doctors=Doctor::all();
                return view("user.home", compact("doctors"));
            }else{
                return view("admin.home");
            }
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect("home");
        }else{
            $doctors=Doctor::all();
            return view("user.home", compact("doctors"));
        }
    }

    public function appointment(Request $request){
        $data=new Appointment;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status="In Progress ";
        if(Auth::id()){
            $data->user_id= Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with("message", "Appointment Request Successfull. We will contact with you soon.");
    }

    public function MyAppointment(){
        if(Auth::id()){
            $userId=Auth::user()->id;
            $appointments=Appointment::where("user_id", $userId)->get();
            return view("user.appointmentShow", compact("appointments"));
        }else{
            return redirect()->back();
        }
    }

    public function cancelAppointment($id){
        $data=Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
