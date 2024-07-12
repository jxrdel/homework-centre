@extends('layout')

@section('title')
    <title>Appointments | Vacation Child Care</title>
@endsection

@section('styles')
    <style>
        .available-timeslot {
            background-color: rgb(248, 145, 145) !important;
            color: white !imporgb(223, 120, 120)nt;
        }
    </style>
@endsection

@section('content')

        @livewire('create-appointment-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="bi bi-journal-bookmark"></i> &nbsp; Appointments</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#createAppointmentModal" class="btn btn-primary btn-icon-split" style="width: 13rem;margin:auto">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-book-medical" style="color: white"></i>
                        </span>
                        <span class="text"  style="width: 200px">Book Appointment</span>
                    </a>
                </div>
                <div id='calendar' style="max-height: 800px;margin-top:30px"></div>
            </div>
          </div>

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info) {
          // Format the date as YYYYMMDD
          var formattedDate = info.dateStr.replace(/-/g, '');
          // Redirect to the desired route with the formatted date
          window.location.href = `/BookAppointment/${formattedDate}`;
        }
      });

      calendar.render();

      // Log the start date when the calendar is clicked
      calendarEl.addEventListener('click', function() {
        var startDate = calendar.view.activeStart;
        console.log('Start date of the view: ' + startDate.toISOString());
      });
    });



    window.addEventListener('display-create-modal', event => {
            $('#createAppointmentModal').modal('show');
        })

    window.addEventListener('close-create-modal', event => {
            $('#createAppointmentModal').modal('hide');
        })


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
