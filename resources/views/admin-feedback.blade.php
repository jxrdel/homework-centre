@extends('layout')

@section('title')
    <title>Feedback Forms | VOSC</title>
@endsection

@section('content')

        @livewire('view-feedback-form')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-comment"></i> &nbsp; Feedback Forms</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                
                <div class="row" style="margin-top: 30px">

                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Feedback Number</th>
                                <th>Date Recieved</th>
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
                order: [[0, 'desc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getallfeedbackforms') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'FeedbackFormID', name: 'FeedbackFormID' },
                        { data: 'created_at_formatted', name: 'created_at_formatted' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                return '<div style="text-align:center"><a href="#" onclick="showView(' + data.FeedbackFormID + ')">View</a></div>';
                            }
                        },
                ]
            });
        });
        
        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })
        
        function showView(id) {
            Livewire.dispatch('show-view-modal', { id: id });
        }

        window.addEventListener('close-create-modal', event => {
            $('#createFeedbackModal').modal('hide');
        })
        
        window.addEventListener('display-view-modal', event => {
            $('#viewFeedbackModal').modal('show');
        })

        window.addEventListener('display-delete-modal', event => {
            $('#deleteRecordModal').modal('show');
        })

        window.addEventListener('close-delete-modal', event => {
            $('#deleteRecordModal').modal('hide');
        })

    </script>
@endsection
