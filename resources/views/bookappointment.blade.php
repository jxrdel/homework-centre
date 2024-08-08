
@php
use Carbon\Carbon;

// Assuming $startdate is passed to the view in Ymd format (e.g., 20241230)
$formattedDate = Carbon::createFromFormat('Ymd', $date)->format('F jS, Y');
@endphp

@extends('layout')

@section('title')
    <title>Book Appointment | VOSC</title>
@endsection

@section('styles')

@endsection

@section('content')

        @include('livewire.delete-record-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{route('appointments')}}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                <strong style="margin-right: 90px"><i class="bi bi-journal-bookmark"></i> &nbsp; {{$formattedDate}}</strong>
            </h1>
        </div>

        <!-- Content Row -->
        {{-- <div class="card">
            <div class="card-body"> --}}

                @livewire('book-appointment', ['date' => $date])
            {{-- </div>
          </div> --}}

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

<script>




    window.addEventListener('close-create-modal', event => {
            $('#createAppointmentModal').modal('hide');
        })


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
