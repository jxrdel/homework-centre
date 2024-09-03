@extends('layout')

@section('title')
    <title>Admin Registration | VOSC</title>
@endsection

@section('styles')
<style>
  .spinner{
  height: 70px;
  width: 70px;
  border: 6px solid;
  border-color: rgb(51, 50, 50) transparent rgb(51, 50, 50) transparent;
  border-radius: 50%;
  animation: spin 1.3s linear infinite;
  margin: auto;
  margin-top:10px;
  }

  @keyframes spin {
  to {
      transform: rotate(360deg);
  }
  }
</style>
@endsection

@section('content')

        @livewire('create-child-modal')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-address-card"></i> &nbsp; Registration</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">

                @livewire('admin-registration-form')

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

  window.addEventListener('close-pickup-modal', event => {
  $('#createPickupModal').modal('hide');
  })

window.addEventListener('scroll-to-top', event => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
    })
  </script>
@endsection
