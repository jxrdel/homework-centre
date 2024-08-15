@extends('layout')

@section('title')
    <title>Weekly Reports | VOSC</title>
@endsection

@section('content')

        @livewire('create-weekly-report-modal')
        @livewire('view-weekly-report-modal')
        @livewire('edit-weekly-report-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><i class="fa-brands fa-wpforms"></i> &nbsp; Forms</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="accidents-tab" data-bs-toggle="tab" data-bs-target="#accidents-tab-pane" type="button" role="tab" aria-controls="accidents-tab-pane" aria-selected="true">Accident Forms</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Incident Forms</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Complaint Forms</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="accidents-tab-pane" role="tabpanel" aria-labelledby="accidents-tab" tabindex="0">
                        
                        <div class="row" style="margin-top: 20px">
<<<<<<< HEAD
                            <a href="{{route('admin.forms.accident.create')}}" class="btn btn-primary btn-icon-split" style="width: 12rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">Create Report</span>
=======
                            <a href="{{route('admin.forms.accident.create')}}" class="btn btn-primary btn-icon-split" style="width: 14rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">New Accident Form</span>
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                            </a>
                        </div>

                        
                        <div class="row" style="margin-top: 30px">

                            <table id="accidentTable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Report Date</th>
<<<<<<< HEAD
                                        <th>End Date</th>
=======
                                        <th>Name of Child</th>
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                                        <th style="text-align: center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
<<<<<<< HEAD
                        
                        
                        <div class="row" style="margin-top: 20px">
                            <a href="{{route('admin.forms.incident.create')}}" class="btn btn-primary btn-icon-split" style="width: 12rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">Create Incident</span>
=======

                        <div class="row" style="margin-top: 20px">
                            <a href="{{route('admin.forms.incident.create')}}" class="btn btn-primary btn-icon-split" style="width: 14rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">New Incident Form</span>
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                            </a>
                        </div>

                        
                        <div class="row" style="margin-top: 30px">

                            <table id="incidentTable" class="table table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Report Date</th>
<<<<<<< HEAD
                                        <th>End Date</th>
=======
                                        <th>Time of Incident</th>
                                        <th style="text-align: center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="row" style="margin-top: 20px">
                            <a href="{{route('admin.forms.complaint.create')}}" class="btn btn-primary btn-icon-split" style="width: 12rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">Create Complaint</span>
                            </a>
                        </div>

                        
                        <div class="row" style="margin-top: 30px">

                            <table id="complaintTable" class="table table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Report Date</th>
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                                        <th style="text-align: center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
=======
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                  </div>
                  
            </div>
          </div>

@endsection

@section('scripts')

    @if (Session::has('success'))

    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.success("{{ Session::get('success') }}",'' , {timeOut:3000});
    </script>

    @endif
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

    <script>

        $(document).ready(function() {
            $('#accidentTable').DataTable({
                "pageLength": 10,
                // order: [[1, 'asc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getaccidentreports') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'DateOfReport', name: 'DateOfReport' },
                        { data: 'ChildName', name: 'ChildName' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
<<<<<<< HEAD
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.WeeklyReportID + ')">View</a> | <a href="#" onclick="showEdit(' + data.WeeklyReportID + ')">Edit</a></div>';
=======
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.id + ')">View</a> | <a href="#" onclick="showEdit(' + data.id + ')">Edit</a></div>';
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                            }
                        },
                ]
            });
        });

        $(document).ready(function() {
            $('#incidentTable').DataTable({
                "pageLength": 10,
                // order: [[1, 'asc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getincidentreports') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'DateOfReport', name: 'DateOfReport' },
                        { data: 'TimeOfIncident', name: 'TimeOfIncident' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
<<<<<<< HEAD
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.WeeklyReportID + ')">View</a> | <a href="#" onclick="showEdit(' + data.WeeklyReportID + ')">Edit</a></div>';
=======
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.id + ')">View</a> | <a href="#" onclick="showEdit(' + data.id + ')">Edit</a></div>';
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                            }
                        },
                ]
            });
        });
<<<<<<< HEAD
        
=======
 
        $(document).ready(function() {
            $('#complaintTable').DataTable({
                "pageLength": 10,
                // order: [[1, 'asc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getcomplaints') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'DateOfComplaint', name: 'DateOfComplaint' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.id + ')">View</a> | <a href="#" onclick="showEdit(' + data.id + ')">Edit</a></div>';
                            }
                        },
                ]
            });
        });       
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
        window.addEventListener('refresh-table', event => {
            $('#accidentTable').DataTable().ajax.reload();
        })

        window.addEventListener('close-create-modal', event => {
            $('#createReportModal').modal('hide');
        })
                
        function showView(id) {
            Livewire.dispatch('show-view-modal', { id: id });
        }

        window.addEventListener('display-view-modal', event => {
            $('#viewReportModal').modal('show');
        })

        function showEdit(id) {
            Livewire.dispatch('show-edit-modal', { id: id });
        }

        window.addEventListener('display-edit-modal', event => {
            $('#editReportModal').modal('show');
        })

        window.addEventListener('close-edit-modal', event => {
            $('#editReportModal').modal('hide');
        })

    </script>
@endsection
