<div>
    
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="card" style="padding-left:20px;min-height:180px;border:none">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <img style="max-height: 180px;width:auto;margin-top:25px" src="{{ Storage::url($student->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h3 class="card-title"><strong>{{$student->FirstName}} {{$student->OtherNames}} {{$student->LastName}}</strong></h3>
                                <h5><i class="fa-solid fa-venus-mars"></i> {{$student->Sex}}</h5>
                                <h5><i class="fa-solid fa-cake-candles"></i>&nbsp;{{ \Illuminate\Support\Carbon::parse($student->DOB)->format('F jS, Y') }}</h5>
                                <h5><i class="fa-solid fa-house-user"></i> {{$student->Address}}</h5>
                                <h5><i class="fa-solid fa-graduation-cap"></i> {{$student->SchoolName}}</h5>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Medical Information</h4>
                </div>
                <div class="card-body">
                    <h5>Allergies: {{$student->Allergies ? $student->Allergies : 'N/A'}}</h5>
                    <h5>Medical Problems: {{$student->MedicalProblems ? $student->MedicalProblems : 'N/A'}}</h5>
                    <h5>Disabilities: {{$student->Disabilities ? $student->Disabilities : 'N/A'}}</h5>
                    <h5>Additional Information: {{$student->AdditionalInfo ? $student->AdditionalInfo : 'N/A'}}</h5>

                    {{-- Display Immunization if it is set in the database --}}
                    @if ($student->ImmunizationPath)
                        <h5>Immunization Card: <a href="{{ Storage::url($student->ImmunizationPath) }}" target="_blank">View Immunization Card <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h5>
                    @else
                        <h5>Immunization Card: N/A</h5>
                    @endif

                    {{-- Display doctor information if it is set --}}
                    @if ($student->DoctorName)
                        <h5>Doctor Name: {{$student->DoctorName ? $student->DoctorName : 'N/A'}}</h5>
                        <h5>Phone: {{$student->DoctorPhone ? $student->DoctorPhone : 'N/A'}}</h5>
                        <h5>Address: {{$student->DoctorAddress ? $student->DoctorAddress : 'N/A'}} {{$student->DoctorCity}}</h5>
                    @endif
                </div>
            </div>
        </div>
        </div>

        <div class="row">

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Parents</h4>
                </div>
                <div class="card-body">
    
                @foreach ($student->parents as $parent)
                <div class="row">
                    <div class="card" style="padding-left:20px;min-height:180px;border:none">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img style="max-height: 180px;width:auto;margin-top:25px" src="{{ Storage::url($parent->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title"><strong>{{$parent->FirstName}} {{$parent->LastName}}</strong></h3>
                                <h5><i class="fa-solid fa-mobile-screen-button"></i> {{$parent->MobileNo}}</h5>
                                <h5><i class="fa-solid fa-square-phone"></i> {{$parent->HomeNo}}</h5>
                                <h5>Ext: {{$parent->WorkNo}}</h5>
                                <h5><i class="fa-solid fa-envelope"></i> {{$parent->Email}}</h5>
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
                <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Emergency Contact</h4>
                </div>
                <div class="card-body">
    
                <div class="row">
                    <div class="card" style="padding-left:20px;min-height:180px;border:none">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img style="max-height: 180px;width:auto;margin-top:25px" src="{{ Storage::url($emergencycontact->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title"><strong>{{$emergencycontact->FirstName}} {{$emergencycontact->LastName}}</strong></h3>
                                <h5><i class="fa-solid fa-mobile-screen-button"></i> {{$emergencycontact->MobileNo ? $emergencycontact->MobileNo : 'N/A'}}</h5>
                                <h5><i class="fa-solid fa-square-phone"></i> {{$emergencycontact->HomeNo ? $emergencycontact->HomeNo : 'N/A'}}</h5>
                                <h5>Ext: {{$emergencycontact->WorkNo ? $emergencycontact->WorkNo : 'N/A'}}</h5>
                                <h5><i class="fa-solid fa-envelope"></i> {{$emergencycontact->Email ? $emergencycontact->Email : 'N/A'}}</h5>
                            </div>
                        </div>
                        </div>
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
                <h4 style="text-align: center;color:black" class="m-0 font-weight-bold">Pickup Contacts</h4>
                </div>
                <div class="card-body">
    
                @forelse ($pickups as $contact)
                <div class="row">
                    <div class="card" style="padding-left:20px;min-height:180px;border:none">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                @if ($contact->PicturePath)
                                <img style="max-height: 180px;width:auto;margin-top:25px" src="{{ Storage::url($contact->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="">
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
                <p style="text-align: center">No pickup contacts for this student</p>
                @endforelse
                </div>
            </div>
        </div>

        
        <div class="col">
        </div>
        </div>
</div>
