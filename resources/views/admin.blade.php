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

        @livewire('create-timeslot-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><i class="fa-solid fa-user-tie"></i> &nbsp; Admin</h1>
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
            var adminlink = document.getElementById('adminlink');
            adminlink.classList.add('active');

            var myCalendar = document.getElementById('calendar');

            function initializeCalendar() {
                var calendar = new FullCalendar.Calendar(myCalendar, {
                    initialView: 'timeGridWeek',
                    editable: true,
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


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
