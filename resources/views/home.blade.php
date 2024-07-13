@extends('layout')

@section('title')
    <title>Appointments | Vacation Child Care</title>
@endsection

@section('styles')
    <style>
        .available-timeslot {
            background-color: rgb(188, 228, 201) !important;
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
                <div id='calendar' style="max-height: 800px;margin-top:30px"></div>
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

        // Fetch class dates using Axios
        axios.get('/gettimeslotdates')
            .then(response => {
                const dates = response.data;

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    selectable: true,
                    dateClick: function(info) {
                        // Format the date as YYYYMMDD
                        var formattedDate = info.dateStr.replace(/-/g, '');
                        // Redirect to the desired route with the formatted date
                        window.location.href = `/BookAppointment/${formattedDate}`;
                    },
                    dayCellClassNames: function(arg) {
                        // Add a custom class to days with classes
                        if (dates.includes(arg.date.toISOString().split('T')[0])) {
                            return ['available-timeslot'];
                        }
                        return [];
                    }
                });

                calendar.render();

            })
            .catch(error => {
                console.error('There was an error fetching the class dates!', error);
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
