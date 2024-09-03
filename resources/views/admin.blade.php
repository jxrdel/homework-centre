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
                    initialView: 'dayGridMonth',
                    editable: false,
                    selectable: true,
                    events: '/gettimeslots', // Fetch events from the specified route
                    select: function(info) {
                        // Ensure only single dates are selectable
                        var startDate = moment(info.startStr).startOf('day');
                        var endDate = moment(info.endStr).startOf('day');

                        // Check if endDate is the day after startDate
                        if (endDate.isSame(startDate.clone().add(1, 'day'), 'day')) {
                            console.log('Selected range from: ' + info.startStr + ' to ' + info.endStr);
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
