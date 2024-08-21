@extends('layout')

@section('title')
    <title>Homework Centre | Admin</title>
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

        @livewire('date-appointments')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin</h1>
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
            var myCalendar = document.getElementById('calendar');

            // Fetch appointment counts from the backend
            axios.get('/getappointmentcount').then(response => {
                const appointmentCounts = response.data;

                var calendar = new FullCalendar.Calendar(myCalendar, {
                    initialView: 'dayGridMonth',
<<<<<<< Updated upstream
                    editable: true,
                    selectable: true,
                    select: function(info) {
                        // Ensure only single dates are selectable
                        var startDate = moment(info.startStr);
                        var endDate = moment(info.endStr).subtract(1, 'days');

                        if (startDate.isSame(endDate, 'day')) {
                            console.log('Selected date: ' + info.startStr);
                            Livewire.dispatch('show-appointments', { date: info.startStr });
=======
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
>>>>>>> Stashed changes
                        } else {
                            calendar.unselect();
                        }
                    },
                    dayCellClassNames: function(arg) {
                        const dateStr = arg.date.toISOString().split('T')[0];
                        if (appointmentCounts[dateStr] && appointmentCounts[dateStr] >= 3) {
                            return 'max-appointments';
                        } else if (appointmentCounts[dateStr] && appointmentCounts[dateStr] > 0) {
                            return 'appointment-day';
                        }
                        return '';
                    }
                });

                calendar.render();

                // Refresh calendar events
                window.addEventListener('refresh-calendar', event => {
                    calendar.refetchEvents();
                });
            }).catch(error => {
                console.error('Error fetching appointment counts:', error);
            });
        });



    window.addEventListener('display-appointments-modal', event => {
            $('#dateAppointmentModal').modal('show');
        })

    window.addEventListener('close-appointments-modal', event => {
            $('#dateAppointmentModal').modal('hide');
        })


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
