@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/banner/13.png" class="img-fluid" style="border:1px solid #ccc">
            </div>
            <div class="col-md-6">
                <h2>Create an Account & Book your appointment</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium numquam vitae saepe, 
                    doloribus cupiditate earum ab rem sequi corporis repellendus, quas, ipsum nam voluptatem! 
                    Explicabo dolor ea nam itaque eaque?</p>
                <div class="mt-5">
                    <a href="{{ url('/register') }}"><button class="btn btn-success">Register as Patient</button></a>
                    <a href="{{ url('/login') }}"><button class="btn btn-secondary">Login</button></a>
                </div>
            </div>
        </div>
        <hr>
        
        <!-- date picker component -->
        <find-doctor></find-doctor>

    </div>
@endsection
