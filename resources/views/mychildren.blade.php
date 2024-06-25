@extends('layout')

@section('title')
    <title>Homework Centre | My Children</title>
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

        @livewire('create-child-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><i class="fa-solid fa-baby"></i> &nbsp; My Children</h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <a type="button" data-bs-toggle="modal" data-bs-target="#createChildModal" class="btn btn-primary btn-icon-split" style="width: 12rem">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus" style="color: white"></i>
                    </span>
                    <span class="text"  style="width: 200px">Add Child</span>
                </a>

                @livewire('my-children-list')
            </div>
          </div>

@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    var childrenLink = document.getElementById('childrenlink');
    childrenLink.classList.add('active');
});




    window.addEventListener('close-create-modal', event => {
            $('#createChildModal').modal('hide');
        })


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
