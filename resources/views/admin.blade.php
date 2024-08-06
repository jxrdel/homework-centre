@extends('layout')

@section('title')
    <title>Admin | VOSC</title>
@endsection

@section('styles')
    <style>
        .appointment-day {
            background-color: rgb(114, 221, 114) !important;
            color: white !important;
        }
        .max-appointments {
            background-color: rgb(248, 145, 145) !important;
            color: white !imporgb(223, 120, 120)nt;
        }
    </style>
@endsection

@section('content')

        @livewire('create-timeslot-modal')
        @livewire('date-appointments')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-school"></i> &nbsp; Classes</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <div id='calendar' style="max-height: 800px"></div>
            </div>
          </div>

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>


<script>

        document.addEventListener('DOMContentLoaded', function() {
            //Set active link

            var myCalendar = document.getElementById('calendar');

            function initializeCalendar() {
                var calendar = new FullCalendar.Calendar(myCalendar, {
                    initialView: 'timeGridWeek',
                    editable: false,
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'timeGridWeek,timeGridDay,dayGridMonth' // user can switch between the two
                    },
                    events: '/gettimeslots', // Fetch events from the specified route
                    select: function(info) {
                        // Ensure only single dates are selectable
                        var startDate = moment(info.startStr);
                        var endDate = moment(info.endStr);

                        if (startDate.isSame(endDate, 'day')) {
                            console.log('Selected date: ' + info.startStr);
                            Livewire.dispatch('create-timeslot', { starttime: info.startStr, endtime: info.endStr });
                        } else {
                            calendar.unselect();
                        }
                    },
                    eventClick: function(info) {
                        // Log the event's start and end time
                            Livewire.dispatch('show-appointments', { id:info.event.id});
                    }
                });

                calendar.render();

                // Refresh calendar events
                window.addEventListener('refresh-calendar', event => {
                    calendar.refetchEvents();
                });
            }

            initializeCalendar();
        });



    window.addEventListener('display-create-modal', event => {
            $('#createTimeslotModal').modal('show');
        })

    window.addEventListener('close-create-modal', event => {
            $('#createTimeslotModal').modal('hide');
        })

    window.addEventListener('show-appointments', event => {
        $('#dateAppointmentModal').modal('show');
    })

    window.addEventListener('close-details-modal', event => {
            $('#dateAppointmentModal').modal('hide');
        })

    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
