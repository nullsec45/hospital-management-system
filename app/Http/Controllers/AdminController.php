<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function create(){
        return view("admin.add_doctor");
    }

    public function store(Request $request){
        $doctor=new Doctor;
        $image=$request->image;

        $imageName=time().".".$image->getClientoriginalExtension();
        $request->image->move(public_path("doctorimage"), $imageName);
        $doctor->image=$imageName;
        $doctor->name=$request->doctor_name;
        $doctor->phone=$request->phone;
        $doctor->specialty=$request->specialty;
        $doctor->room=$request->room;

        $doctor->save();
        return redirect()->back()->with("message","Doctor Add Successfully");
    }

    public function appointments(){
        $dataAppointments=Appointment::all();
        return view("admin.appointmens", compact("dataAppointments"));
    }

    public function approved($id){
        $approved=Appointment::find($id);
        $approved->status="Approved";
        $approved->save();
        
        return redirect()->back();
    }

    public function cancelAppointment($id){
        $data=Appointment::find($id);
        $data->status="Canceled";
        $data->save();
        return redirect()->back();
    }

    public function showDoctor(){
        $doctors=Doctor::all();
        return view("admin.doctors", compact("doctors"));
    }

    public function deleteDoctor($id){
        $doctor=Doctor::find($id);
        $doctor->delete();

        return redirect()->back();
    }

    public function editDoctor($id){
        $data=Doctor::find($id);
        return view("admin.edit_doctor", compact("data"));
    }

    public function updateDoctor(Request $request, $id){
        $doctor=Doctor::find($id);

        $doctor->name=$request->doctor_name;
        $doctor->phone=$request->phone;
        $doctor->specialty=$request->specialty;
        $doctor->room=$request->room;
        $image=$request->image;

        if($image){            
         $imageName=time().".".$image->getClientoriginalExtension();
         $request->image->move(public_path("doctorimage"), $imageName);
         $doctor->image=$imageName;
        }
        $doctor->save();
        return redirect()->back()->with("message","Doctor Updated Successfully");

    }

    public function emailView($id){
        $data=Appointment::find($id);
        return view("admin.email", compact("data"));
    }

    public function sendEmail(Request $request, $id){
        $data=Appointment::find($id);
        $details=[
            "greeting" => $request->greeting,
            "body" => $request->body,
            "action" => $request->action,
            "action_url" => $request->action_url,
            "end_part" => $request->end_part,
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with("message","Email send is successfully");
    }
}
