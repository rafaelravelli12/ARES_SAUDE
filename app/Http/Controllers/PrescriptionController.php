<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Prescription;


class PrescriptionController extends Controller
{
    public function index(){

        date_default_timezone_set('America/Sao_Paulo');

        $bookings = Booking::where('date',date('Y-m-d'))->where('status',1)
        ->where('doctor_id',auth()->user()->id)->get();
        return view('prescription.index',compact('bookings'));
    }

    public function store(Request $request){

        $data = $request->all();
        $data['medicine'] = implode(',',$request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message','Prescription created');
    }

    public function show($userId,$date){
        $prescription = Prescription::where('uder_id',$userId)->where('date',$date)->first();
        return view('prescription.show',compact('prescription'));
    }
}
