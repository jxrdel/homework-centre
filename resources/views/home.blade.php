@extends('layout')

@section('title')
    <title>Homework Centre | Dashboard</title>
@endsection

@section('styles')
    <style>
        .max-appointments {
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
<<<<<<< Updated upstream
=======
          
        <div class="row" style="margin-top: 30px">
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.registration')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-brands fa-wpforms"></i> &nbsp; Registration</h3>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.students.all')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-children"></i> &nbsp; Students</h3>
                  </div>
              </a>
            </div>
              
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.parents.all')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-person-breastfeeding"></i> &nbsp; Parents</h3>
                  </div>
              </a>
            </div>
        </div>
          
        <div class="row" style="margin-top: 30px;margin-bottom: 30px">
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.feedback')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-comments"></i> &nbsp; Feedback Forms</h3>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.weeklyreports')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-chart-line"></i> &nbsp; Weekly Reports</h3>
                  </div>
              </a>
            </div>
              
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.stock')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-box-open"></i> &nbsp; Stock</h3>
                  </div>
              </a>
            </div>
        </div>
          
        <div class="row" style="margin-top: 30px;margin-bottom: 30px">
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.forms')}}">
                  <div class="card card-1">
                    <h4 style="margin: auto;text-align:center"><i class="fa-solid fa-person-falling-burst"></i> &nbsp;<strong>Accident/Incident Forms</strong></h4>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
            </div>
              
            <div class="col">
              
            </div>
        </div>
        @endif
>>>>>>> Stashed changes

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
            var calendarElement = document.getElementById('calendar');

            // Fetch appointment counts from the backend
            axios.get('/getappointmentcount').then(response => {
                const appointmentCounts = response.data;

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
                    dayCellClassNames: function(arg) {
                        const dateStr = arg.date.toISOString().split('T')[0];
                        if (appointmentCounts[dateStr] && appointmentCounts[dateStr] >= 3) {
                            return 'max-appointments';
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
