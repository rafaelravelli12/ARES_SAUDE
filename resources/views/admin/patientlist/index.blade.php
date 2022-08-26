@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Patients</h5>
                    <span>List of all Patients</span>
                </div>
            </div>
        </div>
      <div class="col-lg-4">
          <nav class="breadcrumb-container" aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="../index.html"><i class="ik ik-home"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Patients</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List of all Patients</li>
              </ol>
          </nav>
      </div>    
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Appointments ({{$bookings->count()}})</div>
                <form action="{{ route('patient') }}" method="GET">
                    <div class="card-header">
                        Filter:
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control datetimepicker-input" id="datepicker" 
                                data-toggle="datetimepicker" data-target="#datepicker" name="date">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Date</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Time</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key=>$booking)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td><img src="/profile/{{ $booking->user->image }}" width="80" style="border-radius: 50%;"></td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>{{ $booking->user->phone_number }}</td>
                                <td>{{ $booking->user->gender }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->doctor->name }}</td>
                                <td>
                                    @if($booking->status==0)
                                        <a href="{{ route('update.status',[$booking->id]) }}">
                                            <button class="btn btn-primary">Pending</button>
                                        </a>
                                    @else
                                        <a href="{{ route('update.status',[$booking->id]) }}">
                                            <button class="btn btn-success">Checked</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td>There is no appointments today</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
