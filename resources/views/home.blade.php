@extends('layout')

@section('title')
    <title>Home | VOSC</title>
@endsection

@section('styles')
    <style>
        .card{
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
            padding: 14px 80px 18px 36px;
            cursor: pointer;
        }
    
        .card:hover{
            transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }
    
        .card h3{
        font-weight: 600;
        }
    
        .card img{
        position: absolute;
        top: 20px;
        right: 15px;
        max-height: 120px;
        }
    
        .card{
            min-height: 150px;
        }
    
        @media(max-width: 990px){
        .card{
            margin: 20px;
        }
        } 
    </style>
@endsection

@section('content')

        @livewire('create-appointment-modal')

        <!-- Content Row -->
        @if (Auth::user()->IsParent && !Auth::user()->IsAdmin)
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i style="font-size: 2rem" class="fas fa-person-breastfeeding"></i> &nbsp; Vacation & Out-of-School Centre</strong></h1>
        </div>
            
        <div class="row" style="margin-top: 30px">
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('appointments')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-book"></i> &nbsp; Appointments</h3>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('mychildren')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-children"></i> &nbsp; My Children</h3>
                  </div>
              </a>
            </div>
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('myprofile')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-user"></i> &nbsp; My Profile</h3>
                  </div>
              </a>
            </div>
        </div>
        
      <div class="row" style="margin-top: 30px">
          
          <div class="col">
            
            <a style="text-decoration: none" href="{{route('pickupcontacts')}}">
                <div class="card card-1">
                  <h3 style="margin: auto"><i class="fa-solid fa-users-line"></i> &nbsp; Pickup Contacts</h3>
                </div>
            </a>
          </div>
          
          <div class="col">
            
            <a style="text-decoration: none" href="{{route('emergencycontact')}}">
                <div class="card card-1">
                  <h3 style="margin: auto"><i class="fa-solid fa-id-card"></i> &nbsp; Emergency Contact</h3>
                </div>
            </a>
          </div>
            
          <div class="col">
            
            <a style="text-decoration: none" href="{{route('feedback')}}">
                <div class="card card-1">
                  <h3 style="margin: auto"><i class="fa-solid fa-comment-dots"></i> &nbsp; Feedback</h3>
                </div>
            </a>
          </div>
      </div>
        @endif
        
        @if (Auth::user()->IsAdmin || Auth::user()->IsSuperAdmin)
        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-top:30px">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i style="font-size: 2rem" class="fas fa-user-lock"></i> &nbsp; Admin</strong></h1>
        </div>

        <!-- Content Row -->
        <div class="row" style="margin-top: 30px">
              <div class="col">
                
                <a style="text-decoration: none" href="{{route('admin.classes')}}">
                    <div class="card card-1">
                      <h3 style="margin: auto"><i class="fa-solid fa-chalkboard-user"></i> &nbsp; Classes</h3>
                    </div>
                </a>
              </div>
              
              <div class="col">
                
                <a style="text-decoration: none" href="{{route('admin.attendance')}}">
                    <div class="card card-1">
                      <h3 style="margin: auto"><i class="fa-solid fa-hand"></i> &nbsp; Attendance</h3>
                    </div>
                </a>
              </div>
              <div class="col">
                
                <a style="text-decoration: none" href="{{route('admin.appointments')}}">
                    <div class="card card-1">
                      <h3 style="margin: auto"><i class="fa-solid fa-calendar-days"></i> &nbsp; Appointments</h3>
                    </div>
                </a>
              </div>
          </div>
          
        <div class="row" style="margin-top: 30px">
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.registration')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-brands fa-wpforms"></i> &nbsp; Registration</h3>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.students.all')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-children"></i> &nbsp; Students</h3>
                  </div>
              </a>
            </div>
              
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.parents.all')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-person-breastfeeding"></i> &nbsp; Parents</h3>
                  </div>
              </a>
            </div>
        </div>
          
        <div class="row" style="margin-top: 30px;margin-bottom: 30px">
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.feedback')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-comments"></i> &nbsp; Feedback Forms</h3>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.weeklyreports')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-chart-line"></i> &nbsp; Weekly Reports</h3>
                  </div>
              </a>
            </div>
              
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.stock')}}">
                  <div class="card card-1">
                    <h3 style="margin: auto"><i class="fa-solid fa-box-open"></i> &nbsp; Stock</h3>
                  </div>
              </a>
            </div>
        </div>
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> b94be6ee21818e9757233b2104d20e3c8dcdb0b4
          
        <div class="row" style="margin-top: 30px;margin-bottom: 30px">
            
            <div class="col">
              
              <a style="text-decoration: none" href="{{route('admin.forms')}}">
                  <div class="card card-1">
                    <h4 style="margin: auto;text-align:center"><i class="fa-solid fa-person-falling-burst"></i> &nbsp;<strong>Accident/Incident Forms</strong></h4>
                  </div>
              </a>
            </div>
            
            <div class="col">
              
            </div>
              
            <div class="col">
              
            </div>
        </div>
<<<<<<< HEAD
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8
=======
>>>>>>> b94be6ee21818e9757233b2104d20e3c8dcdb0b4
        @endif

@endsection

@section('scripts')
    
  @if (Session::has('error'))

  <script>
      toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
      }
      toastr.error("{{ Session::get('error') }}",'' , {timeOut:6000});
  </script>

  @endif
  
@endsection