@extends('layout')

@section('title')
    <title>{{$parent->FirstName}} {{$parent->LastName}} | VOSC</title>
@endsection

@section('content')
        <!-- Page Heading -->
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{route('admin.parents.all')}}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
              <strong style="margin-right: 90px"><i class="fa-regular fa-address-card"></i> &nbsp; {{$parent->FirstName}} {{$parent->LastName}}</strong>
            </h1>
        </div>
    <!-- Content Row -->
    <div class="row">

      <div class="col">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Parent Info</h4>
              </div>
              <div class="row g-0">
              <div class="col-md-4">
                  <div style="display: flex; justify-content: center; align-items: center;">
                      <img style="max-height: 180px;width:auto;margin-top:20px;margin-left:10px" src="{{ Storage::url($parent->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                  </div>
              </div>
              <div class="col-md-8">
                <div class="card-body" style="min-height: 230px">
                  <h3 class="card-title"><strong>{{$parent->FirstName}} {{$parent->LastName}}</strong></h3>
                  <h5><i class="fa-solid fa-cake-candles"></i>&nbsp;{{ \Illuminate\Support\Carbon::parse($parent->DOB)->format('F jS, Y') }}</h5>
                  <h5><i class="fa-solid fa-envelope"></i> {{$parent->Email}}</h5>
                  <h5><i class="fa-solid fa-briefcase"></i> {{$parent->Ministry}} {{$parent->Department}}</h5>
                  <h5><i class="fa-solid fa-phone"></i> {{$parent->MobileNo}} {{$parent->HomeNo ? '| ' . $parent->HomeNo : ''}} {{$parent->WorkNo ? '| Ext. ' . $parent->WorkNo : ''}}</h5>
<<<<<<< HEAD
=======
                  <h5><i class="fa-solid fa-envelope-open-text"></i> <a href="{{ Storage::url($parent->JobLetterPath) }}" target="_blank">Job Letter <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h5>
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
                  </div>
              </div>
              </div>
          </div>
      </div>

      <div class="col">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Emergency Contact</h4>
              </div>
              <div class="row g-0">
              <div class="col-md-4">
                  <div style="display: flex; justify-content: center; align-items: center;">
                      <img style="max-height: 180px;width:auto;margin-top:20px" src="{{ Storage::url($emergencycontact->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card-body" style="min-height: 230px">
                  <h3 class="card-title"><strong>{{$emergencycontact->FirstName}} {{$emergencycontact->LastName}}</strong></h3>
                  <h5><i class="fa-solid fa-envelope"></i> {{$emergencycontact->Email}}</h5>
                  <h5><i class="fa-solid fa-phone"></i> {{$emergencycontact->MobileNo}} {{$emergencycontact->HomeNo ? '| ' . $emergencycontact->HomeNo : ''}} {{$emergencycontact->WorkNo ? '| Ext. ' . $emergencycontact->WorkNo : ''}}</h5>
                  <h5><i class="fa-solid fa-handshake"></i> {{$emergencycontact->ChildRelationship}}</h5>
                  </div>
              </div>
              </div>
          </div>
      </div>
      </div>

      <div class="row">

      <div class="col">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Children</h4>
              </div>
              <div class="card-body">
  
              @foreach ($children as $child)
              <div class="row">
                  <div class="card" style="margin-top:10px; padding-left:20px;min-height:180px;border:none">
                      <div class="row g-0">
                      <div class="col-md-4">
                          <div style="display: flex; justify-content: center; align-items: center;">
                              <img style="max-height: 180px;width:auto;margin-top:25px" src="{{ Storage::url($child->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                            <h3 class="card-title"><strong>{{$child->FirstName}} {{$child->OtherNames}} {{$child->LastName}}</strong></h3>
                            <h5><i class="fa-solid fa-venus-mars"></i> {{$child->Sex}}</h5>
                            <h5><i class="fa-solid fa-cake-candles"></i>&nbsp;{{ \Illuminate\Support\Carbon::parse($child->DOB)->format('F jS, Y') }}</h5>
                            <h5><i class="fa-solid fa-house-user"></i> {{$child->Address}}</h5>
                            <h5><i class="fa-solid fa-graduation-cap"></i> {{$child->SchoolName}}</h5>
                          </div>
                      </div>
                      </div>
                  </div>
              </div>
              @endforeach
              </div>
          </div>
      </div>

      
      <div class="col">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Pickup Contacts</h4>
              </div>
              <div class="card-body">
  
              @forelse ($pickupcontacts as $contact)
              <div class="row">
                  <div class="card" style="margin-top:10px; padding-left:20px;min-height:180px;border:none">
                      <div class="row g-0">
                      <div class="col-md-4">
                          <div style="display: flex; justify-content: center; align-items: center;">
                              @if ($contact->PicturePath)
                              <img style="max-height: 180px;width:auto;" src="{{ Storage::url($contact->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="">
                              @else
                                  <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" alt="">
                              @endif
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <h3 class="card-title"><strong>{{$contact->FirstName}} {{$contact->LastName}}</strong></h3>
                              <h5><i class="fa-solid fa-mobile-screen-button"></i>{{$contact->MobileNo ? $contact->MobileNo : 'N/A'}}</h5>
                              <h5><i class="fa-solid fa-square-phone"></i> {{$contact->HomeNo ? $contact->MobileHomeNoNo : 'N/A'}}</h5>
                              <h5>Ext: {{$contact->WorkNo ? $contact->WorkNo : 'N/A'}}</h5>
                              <h5><i class="fa-solid fa-envelope"></i> {{$contact->Email ? $contact->Email : 'N/A'}}</h5>
                          </div> 
                      </div>
                      </div>
                  </div>
              </div>
              @empty
              <p style="text-align: center">No pickup contacts for this parent</p>
              @endforelse
              </div>
          </div>
      </div>
      </div>

      
      <div class="row">

      <div class="col">
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Additional Info</h4>
              </div>
              <div class="card-body">
                <p>Media Release: <i class="{{$parent->MediaReleaseConsent ? 'bi bi-check-lg' : 'bi bi-x-lg'}}"></i> </p>
                <p>Emergency Consent: <i class="{{$parent->EmergencyConsent ? 'bi bi-check-lg' : 'bi bi-x-lg'}}"></i> </p>
                <p>Windows Login: <i class="{{$parent->HasWindowsLogin ? 'bi bi-check-lg' : 'bi bi-x-lg'}}"></i> </p>
              </div>
          </div>
      </div>

      
      <div class="col">
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


    window.addEventListener('refresh-calendar', event => {
        calendar.refetchEvents();
    })

  </script>
@endsection
