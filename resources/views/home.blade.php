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

    var dashboardLink = document.getElementById('dashboardlink');
    dashboardLink.classList.add('active');

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        events: '{{ route('myappointments') }}',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'timeGridWeek,timeGridDay,dayGridMonth' // user can switch between the two
        },
        editable: false,
        selectable: true,
        select: function(info) {
            // Display the selected range in the console
            var startDate = moment(info.startStr);
            var endDate = moment(info.endStr);

            if (startDate.isSame(endDate, 'day')) {
                console.log('Selected range:', info.startStr, 'to', info.endStr);
                Livewire.dispatch('create-appointment', { startdate: info.startStr, enddate: info.endStr });
            } else {
                calendar.unselect();
            }
        },
        eventDidMount: function(info) {
            // Check if the event is a timeslot and set the background color
            if (info.event.extendedProps.isTimeslot) {
                info.el.style.backgroundColor = 'green';
            }
        },
    });

    calendar.render();

    // Custom event listener to refresh the calendar
    document.addEventListener('refresh-calendar', function() {
        calendar.refetchEvents();
    });

    // Fetch and render timeslots with green background
    fetchTimeslotsAndRender();

    function fetchTimeslotsAndRender() {
        fetch('{{ route('gettimeslots') }}')
            .then(response => response.json())
            .then(timeslots => {
                timeslots.forEach(timeslot => {
                    calendar.addEvent({
                        start: timeslot.start,
                        end: timeslot.end,
                        display: 'background',
                        extendedProps: {
                            isTimeslot: true
                        }
                    });
                });
            })
            .catch(error => console.error('Error fetching timeslots:', error));
    }
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
