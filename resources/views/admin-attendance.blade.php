@extends('layout')

@section('title')
    <title>Attendance | VOSC</title>
@endsection

@section('styles')
<style>
    .card{
        border-radius: 4px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
        padding: 14px 80px 18px 36px;
        cursor: pointer;
    }

    .card:hover{
        transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }

    .card h3{
    font-weight: 600;
    }

    .card img{
    position: absolute;
    top: 20px;
    right: 15px;
    max-height: 120px;
    }

    .card{
        min-height: 150px;
    }

    @media(max-width: 990px){
    .card{
        margin: 20px;
    }
    } 
</style>
@endsection
@section('content')

        @livewire('create-child-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-hand"></i> &nbsp;Attendance - {{$today}}</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="row" style="margin-top: 30px">
          @forelse ($classes as $class)
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.attendance.class', ['id' => $class->TimeSlotID])}}">
                  <div class="card">
                    <h3 style="margin: auto">{{ \Carbon\Carbon::parse($class->StartTime)->format('g:i A') }} - {{ \Carbon\Carbon::parse($class->EndTime)->format('g:i A') }}</h3>
                  </div>
              </a>
            </div>
            @empty
            <p style="text-align: center">No classes today</p>
          @endforelse
        </div>

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>


@if (Session::has('success'))

  <script>
      toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
      }
      toastr.success("{{ Session::get('success') }}",'' , {timeOut:3000});
  </script>

@endif

<script>


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
