@extends('layout')

@section('title')
    <title>Pickup Contacts | VOSC</title>
@endsection

@section('content')

        @livewire('edit-pickup-contact-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-regular fa-address-card"></i> &nbsp; Pickup Contacts</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                @livewire('create-pickup-contact-modal')

                <div class="row" style="margin-top: 30px">

                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Actions</th>
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
                    "url": "{{ route('getpickupcontacts') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'FirstName', name: 'FirstName' },
                        { data: 'LastName', name: 'LastName' },
                        { data: 'Email', name: 'Email' },
                        { data: 'MobileNo', name: 'MobileNo' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                return ' <a href="#" onclick="showEdit(' + data.PickupContactID + ')">Edit</a> | <a href="#" onclick="showDelete(' + data.PickupContactID + ')">Delete</a>';
                            }
                        },
                ]
            });
        });

        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })

        
        window.addEventListener('close-create-modal', event => {
            $('#createPickupModal').modal('hide');
        })

        function showEdit(id) {
            Livewire.dispatch('show-edit-modal', { id: id });
        }

        window.addEventListener('display-edit-modal', event => {
            $('#editPickupModal').modal('show');
        })

        window.addEventListener('close-edit-modal', event => {
            $('#editPickupModal').modal('hide');
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
