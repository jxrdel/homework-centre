@extends('layout')

@section('title')
    <title>My Children | Vacation Child Care</title>
@endsection

@section('content')

        @livewire('create-child-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-baby"></i> &nbsp; My Children</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#createChildModal" class="btn btn-primary btn-icon-split" style="width: 12rem;margin:auto">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus" style="color: white"></i>
                        </span>
                        <span class="text"  style="width: 200px;">Add Child</span>
                    </a>
                </div>

                @livewire('my-children-list')
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
    toastr.error("{{ Session::get('error') }}",'' , {timeOut:4000});
</script>

@endif

<script>
    window.addEventListener('close-create-modal', event => {
            $('#createChildModal').modal('hide');
        })


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
