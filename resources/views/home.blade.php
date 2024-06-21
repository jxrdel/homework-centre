@extends('layout')

@section('title')
    <title>Homework Centre | Dashboard</title>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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

<script>document.addEventListener('DOMContentLoaded', function() {
    var calendarElement = document.getElementById('calendar');

    // Fetch appointment counts from the backend
    axios.get('/getappointmentcount').then(response => {
        const appointmentCounts = response.data;

        // Fetch available timeslots from the backend
        axios.get('/gettimeslots').then(timeslotResponse => {
            const timeslots = timeslotResponse.data;

            var calendar = new FullCalendar.Calendar(calendarElement, {
                initialView: 'timeGridWeek',
                events: '{{ route('myappointments') }}',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay,dayGridMonth' // user can switch between the two
                },
                editable: true,
                selectable: true,
                select: function(info) {
                    // Display the selected range in the console
                    console.log('Selected range:', info.startStr, 'to', info.endStr);
                    Livewire.dispatch('create-appointment', { startdate: info.startStr, enddate: info.endStr });
                },
                eventClick: function(info) {
                    // Display event information in the console
                    console.log('Event ID:', info.event.id);
                },
                slotClassNames: function(arg) {
                    const slotStart = arg.date;
                    const slotEnd = new Date(slotStart);
                    slotEnd.setMinutes(slotStart.getMinutes() + calendar.getOption('slotDuration').minutes);

                    const slotStr = slotStart.toISOString().split('T')[1].substring(0, 5); // "HH:MM"

                    // Check if the timeslot is available
                    if (timeslots.includes(slotStr)) {
                        return 'available-timeslot';
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
            console.error('Error fetching timeslots:', error);
        });
    }).catch(error => {
        console.error('Error fetching appointment counts:', error);
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
