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
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><i class="fa-solid fa-chart-pie"></i> &nbsp; Weekly Reports</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <button data-bs-toggle="modal" data-bs-target="#createReportModal"  class="btn btn-primary btn-icon-split" style="width: 12rem;margin:auto">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-plus" style="color: white"></i>
                        </span>
                        <span class="text"  style="width: 200px;">Create Report</span>
                    </button>
                </div>

                
                <div class="row" style="margin-top: 30px">

                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>

@endsection

@section('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>

    <script>

$(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 10,
                // order: [[1, 'asc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getweeklyreports') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'StartDate', name: 'StartDate' },
                        { data: 'EndDate', name: 'EndDate' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.WeeklyReportID + ')">View</a> | <a href="#" onclick="showEdit(' + data.WeeklyReportID + ')">Edit</a></div>';
                            }
                        },
                ]
            });
        });
        
        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
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
