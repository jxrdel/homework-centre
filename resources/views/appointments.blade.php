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
        .legend {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            background-color:  rgb(123, 187, 143) !important;
            margin-right: 8px;
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
        <div class="card" id="contentCard">
            
        <h5 style="margin: auto;margin-top:10px"><i style="color: #106299" class="fa-solid fa-circle-info"></i> Select a date to make an appointment</h5>
            <div class="card-body" style="min-height: 100px">
                
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color"></div>
                        <span>Available Classes</span>
                    </div>
                    <!-- Add more legend items here if needed -->
                </div>
                <div class="spinner" id="loadingSpinner" style="margin-top: -50px"></div>
                <div id='calendar' style="max-height: 800px;"></div>
            </div>
          </div>

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

@if (Session::has('error'))

<script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true,
    }
    toastr.error("{{ Session::get('error') }}",'' , {timeOut:6000});
</script>

@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var spinner = document.getElementById('loadingSpinner');
    var card = document.getElementById('contentCard');

    // Show the loading spinner
    spinner.style.display = 'block';
    // card.style.display = 'none';

    // Fetch class dates and user appointments using Axios
    axios.all([
        axios.get('/gettimeslotdates'),
        axios.get('/myappointments')
    ])
    .then(axios.spread((timeslotDatesResponse, userAppointmentsResponse) => {
        const timeslotDates = timeslotDatesResponse.data;
        const userAppointments = userAppointmentsResponse.data;

        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: userAppointments,
            dateClick: function(info) {
                // Format the date as YYYYMMDD
                var formattedDate = info.dateStr.replace(/-/g, '');
                // Redirect to the desired route with the formatted date
                window.location.href = `/BookAppointment/${formattedDate}`;
            },
            dayCellClassNames: function(arg) {
                // Add a custom class to days with timeslots and the date is >= today's date
                const dateStr = arg.date.toISOString().split('T')[0];
                if (timeslotDates.includes(dateStr) && dateStr >= today) {
                    return ['available-timeslot'];
                }
                return [];
            }
        });

        // Hide the loading spinner
        spinner.style.display = 'none';
        // card.style.display = 'block';

        calendar.render();
    }))
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
