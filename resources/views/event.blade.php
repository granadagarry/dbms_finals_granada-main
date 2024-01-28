@extends('layout.app')

@section('content')


    <header class="text-center">
        <h1>Event Registration System</h1>
    </header>

    <div class="container">

<div class="row">
    <form action="{{ route('saveEvents') }}" method="post" class="col-md-12">
        @csrf

        <div class="row">
            <label for="EventName" class="col-md-2 col-form-label">Event Name:</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="EventName" placeholder="Enter Event Name">
            </div>



            <label for="Date" class="col-md-2 col-form-label">Date:</label>
            <div class="col-md-10">
                <input class="form-control" type="date" name="Date" placeholder="Enter Date">
            </div>



            <label for="Location" class="col-md-2 col-form-label">Location:</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="Location" placeholder="Enter Location">
            </div>



            <label for="Attendees" class="col-md-2 col-form-label">Attendees:</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="Attendees" placeholder="Enter Attendees">
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <button class="btn btn-primary" type="submit">
                Submit
            </button>
        </div>
    </form>
    <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>

                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Attendee</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>

                            <td>{{ $event->EventName }}</td>
                            <td>{{ $event->Date }}</td>
                            <td>{{ $event->Location }}</td>
                            <td>{{ $event->Attendees }}</td>
                            <td>
                                <a href="{{ route('updateEvents', $event->id) }}">
                                    <button class="btn btn-warning btn-sm">Update</button>
                                </a>
                                <a href="{{ route('removeEvents', $event->id) }}">
                                    <button class="btn btn-danger btn-sm" type="button">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection

@section('title')
    Event Page
@endsection
