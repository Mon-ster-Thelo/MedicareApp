@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">

    @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <div class="row mt-5">

        @foreach($departments as $department)

            <div class="col-lg-4 col-md-4 col-sm-12 text-center mb-3">
                <div class="card" style="width:18rem">
                    <img src="{{ $department->image }}" style="width:200px; margin:0 auto;" />
                    <div class="card-body">
                        <div class="card-title">{{ $department->name }}</div>
                        <div class="card-text">{{ $department->description }}</div>

                        <form method="post" action="{{ route('showAppointments') }}" class="mt-2">
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $department->id }}" />
                            <input type="submit" value="Show Appointments" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>

@endsection
