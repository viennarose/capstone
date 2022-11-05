<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\Setting;
use App\Models\Promotion;
use App\Models\Testimony;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){

        $promotions = Promotion::where('status', '0')->get();
        $images = Service::where('status', '0')->limit(4)->get();
        $testimonies = Testimony::where('status', '0')->limit(1)->get();
        return view('frontend.index', compact('promotions', 'images', 'testimonies'));
    }

    public function viewServices(){
        $images = Service::where('status', '0')->get();
        return view('frontend.services', compact('images'));
    }

    public function viewContacts(){
        $settings = Setting::get();
        return view('frontend.contact', compact('settings'));
    }

    public function viewAbout(){
        $settings = Setting::get();
        $testimonies = Testimony::where('status', '0')->limit(3)->get();
        return view('frontend.about', compact('settings', 'testimonies'));
    }

    // public function create(){
    //     $images = Service::where('status', '0')->get();
    //     return view('frontend.setAppointment', compact('images'));
    // }
    // public function setAppointment(Request $request)
    // {
    //     $validated = $request->validate([
    //         'firstName' =>[ 'required|string'],
    //         'lastName' => ['required|string'],
    //         'email' => ['required','email'],
    //         'services_id' => ['required'],
    //         'contact' => ['required|numeric'],
    //         'schedule' => ['required|string|unique:appointments'],
    //     ]);

    //     Appointment::create([
    //         'firstName' => $request->input('firstName'),
    //         'lastName' => $request->input('lastName'),
    //         'email' => $request->input('email'),
    //         'services_id' => $request->input('services_id'),
    //         'contact' => $request->input('contact'),
    //         'schedule' => $request->input('schedule'),
    //     ]);
    //     return redirect('/set-appointment')->with('message', 'You successfully set your appointment');
    //     // $images = Service::where('status', '0')->get();
    //     // return view('frontend.setAppointment', compact('images'));
    // }


}
