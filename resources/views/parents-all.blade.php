@extends('layout')

@section('title')
    <title>All Parents | VOSC</title>
@endsection

@section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-person-breastfeeding"></i> &nbsp; Parents</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <a type="button" href="{{route('admin.registration')}}" class="btn btn-primary btn-icon-split" style="width: 14rem;margin:auto">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus" style="color: white"></i>
                        </span>
                        <span class="text"  style="width: 200px;">Register Parent</span>
                    </a>
                </div>

                <div class="row" style="margin-top: 30px">

                    <table id="notitable" class="table table-striped table-bordered" style="width: 100%">
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

$(document).ready(function() {
            $('#notitable').DataTable({
                "pageLength": 10,
                // order: [[1, 'asc']],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.getallparents') }}",
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
                                return '<div style="text-align:center"><a href="/Admin/Parents/View/' + data.id + '">View</a> | <a href="/Admin/Parents/Edit/' + data.id + '" >Edit</a></div>';
                            }
                        },
                ]
            });
        });

    </script>
@endsection
