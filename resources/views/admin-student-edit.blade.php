@extends('layout')

@section('title')
    <title>{{$student->FirstName}} {{$student->LastName}} | VOSC</title>
@endsection

@section('content')

        @livewire('create-child-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{route('admin.students.all')}}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                <strong style="margin-right: 90px"><i class="fa-regular fa-address-card"></i> &nbsp; {{$student->FirstName}} {{$student->LastName}}</strong>
            </h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

              @livewire('student-edit-livewire', ['id' => $student->StudentID])
                
            </div>
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
