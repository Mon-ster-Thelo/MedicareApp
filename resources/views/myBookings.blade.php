@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">

    <h2 class="text-center mt-2 mb-2" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #000000;">
        MY BOOKINGS
    </h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Booking id</th>
                <th scope="col">Appointment id</th>
                <th scope="col">Department Name</th>
                <th scope="col">Appointment date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <th scope="row">{{$booking->id}}</th>
                <td>{{$booking->appointment_id}}</td>
                <td>{{$booking->department_name}}</td>
                <td>{{$booking->appointment_date}}</td>
                <td>
                    <form method="post" action="{{ route('cancelBooking') }}">
                        @csrf
                        <input type="hidden" value="{{$booking->id}}" name="booking_id"/>
                        <input type="hidden" value="{{$booking->appointment_id}}" name="appointment_id"/>
                        <input type="submit" value="Cancel" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
