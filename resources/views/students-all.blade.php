@extends('layout')

@section('title')
    <title>All Students | VOSC</title>
@endsection

@section('content')

        @livewire('delete-student-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-children"></i> &nbsp; Students</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                <div class="row" style="margin-top: 30px">

                    <table id="notitable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
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
            $('#notitable').DataTable({
                "pageLength": 10,
                // order: [[1, 'asc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getallstudents') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'FirstName', name: 'FirstName' },
                        { data: 'LastName', name: 'LastName' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                return '<div style="text-align:center"><a href="/Admin/Students/View/' + data.StudentID + '">View</a> | <a href="/Admin/Students/Edit/' + data.StudentID + '" >Edit</a> | <a href="#" onclick="showDelete(' + data.StudentID + ')">Delete</a></div>';
                            }
                        },
                ]
            });
        });
        
        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })
        
        function showDelete(id) {
            Livewire.dispatch('show-delete-modal', { id: id });
        }

        window.addEventListener('display-delete-modal', event => {
            $('#deleteRecordModal').modal('show');
        })

        window.addEventListener('close-delete-modal', event => {
            $('#deleteRecordModal').modal('hide');
        })

    </script>
@endsection
