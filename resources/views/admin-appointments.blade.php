@extends('layout')

@section('title')
    <title>Appointments | VOSC</title>
@endsection

@section('styles')
    <style>
        .available-timeslot {
            background-color: rgb(188, 228, 201) !important;
            color: white !imporgb(223, 120, 120)nt;
        }
        .spinner {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
            position: absolute;
            left: 47%;
            transform: translate(-20%, -20%);
            display: none;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')

        @livewire('create-appointment-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="bi bi-journal-bookmark"></i> &nbsp; Administrator Appointments</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card" id="contentCard">
            <div class="card-body" style="min-height: 100px;position:relative">
                <div class="spinner" id="loadingSpinner"></div>
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
    var spinner = document.getElementById('loadingSpinner');
    var card = document.getElementById('contentCard');

    // Show the loading spinner
    spinner.style.display = 'block';
    // card.style.display = 'none';

    // Fetch class dates using Axios
    axios.get('/gettimeslotdates')
        .then(response => {
            const timeslotDates = response.data;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                events: [], // No user appointments
                dateClick: function(info) {
                    // Format the date as YYYYMMDD
                    var formattedDate = info.dateStr.replace(/-/g, '');
                    // Redirect to the desired route with the formatted date
                    window.location.href = `/Admin/Appointments/Book/${formattedDate}`;
                },
                dayCellClassNames: function(arg) {
                    // Add a custom class to days with classes
                    const dateStr = arg.date.toISOString().split('T')[0];
                    return timeslotDates.includes(dateStr) ? ['available-timeslot'] : [];
                }
            });

            // Hide the loading spinner
            spinner.style.display = 'none';
            // card.style.display = 'block';

            calendar.render();
        })
        .catch(error => {
            console.error('There was an error fetching data!', error);

            // Hide the loading spinner in case of error
            spinner.style.display = 'none';
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
