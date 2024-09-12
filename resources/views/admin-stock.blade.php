@extends('layout')

@section('title')
    <title>Stock | VOSC</title>
@endsection

@section('content')

        @livewire('create-stock-modal')
        @livewire('edit-stock-modal')
        @livewire('delete-record-modal')
        @livewire('generate-stock-report-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><i class="fa-solid fa-box-open"></i> &nbsp; Stock</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Centered Button -->
                    <div class="col"></div>
                    <div class="col d-flex justify-content-center">
                        <button data-bs-toggle="modal" data-bs-target="#createStockModal" class="btn btn-primary btn-icon-split" style="width: 12rem;">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-plus" style="color: white"></i>
                            </span>
                            <span class="text" style="width: 200px;">Add Item</span>
                        </button>
                    </div>
                
                    <!-- Right-Aligned Button -->
                    <div class="col d-flex justify-content-end">
                        <button data-bs-toggle="modal" data-bs-target="#generateReportModal" class="btn btn-dark btn-icon-split" style="width: 12rem;">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-chart-line" style="color: white"></i>
                            </span>
                            <span class="text" style="width: 200px;">Generate Report</span>
                        </button>
                    </div>
                </div>
                

                
                <div class="row" style="margin-top: 30px">

                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th style="width: 50%">Description</th>
                                <th style="width: 10%">Quantity</th>
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
                    "url": "{{ route('admin.getstock') }}",
                    "type": "GET"
                },
                "columns": [
                        { data: 'ItemName', name: 'ItemName' },
                        { data: 'Notes', name: 'Notes' },
                        { data: 'Quantity', name: 'Quantity' },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row) {
                                return '<div style="text-align:center"><a href="/Admin/Stock/Edit/' + data.id + '">View</a> | <a href="#" onclick="showDelete(' + data.id + ')">Delete</a></div>';
                            }
                        },
                ]
            });
        });
        
        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })
 
        window.addEventListener('close-create-modal', event => {
            $('#createStockModal').modal('hide');
        })

        function showEdit(id) {
            Livewire.dispatch('show-edit-modal', { id: id });
        }

        function showDelete(id) {
            Livewire.dispatch('show-delete-modal', { model:'StockItem', id: id });
        }

        window.addEventListener('display-edit-modal', event => {
            $('#editStockModal').modal('show');
        })

        window.addEventListener('close-edit-modal', event => {
            $('#editStockModal').modal('hide');
        })

        window.addEventListener('display-delete-modal', event => {
            $('#deleteRecordModal').modal('show');
        })

        window.addEventListener('close-delete-modal', event => {
            $('#deleteRecordModal').modal('hide');
        })

    </script>
@endsection
