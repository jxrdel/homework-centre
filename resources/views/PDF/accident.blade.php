<style>
    .page-break {
        page-break-after: always;
    }
</style>

<div style="text-align: center;margin-top:-40px">
    <img src="{{ public_path('mohlogo.png') }}" alt="Coat of Arms of Trinidad and Tobago" style="width: 300px; height: auto;">
</div>


<div style="width:80%;margin:auto">
    <h3 style="text-align: center;">Vacation and Out of School Centre (VOSC) Health and Safety Accident Form</h3>
</div>


<div style="width:90%;margin:auto;margin-top:-20px">
    <p style="text-align: center;">For reporting accidents at work that resulted in injury to a child whether serious, fatal or minor*; or damage to facilities, vehicles or equipment.
    </p>
</div>

<p style="text-decoration: underline">Injured Child Information</p>

<p>1. Name of Injured Child: <strong>{{$accident->ChildName}}</strong></p>
<p>2. Age of Injured Child: <strong>{{$accident->ChildAge}}</strong></p>

<p style="text-decoration: underline">Details of Accident</p>

<p>3. Location of Accident: <strong>{{$accident->AccidentLocation}}</strong></p>

<p>4. Date & Time of Accident: <strong>{{ \Carbon\Carbon::parse($accident->TimeOfAccident)->format('l jS F, Y h:i a') }}</strong></p>

<p>5. Brief Description of Accident: <strong>{{$accident->AccidentDescription}}</strong></p>

<p>6. Describe briefly the nature and extent of injuries (attach a copy of medical report if applicable)</p>
<p><strong>{{$accident->InjuryDescription}}</strong></p>

@if ($accident->MedicalReport)
    <p><a  href="{{Storage::url($accident->MedicalReport)}}" target="_blank">Click here to view medical report</a></p>
@endif

<p>7. Remedial Actions Taken after the accident and by whom:</p>
<p><strong>{{$accident->RemedialActions}}</strong></p>

<p>8. Parent/ guardian was notified: <strong>{{ $accident->ParentNotified ? 'Yes' : 'No' }}</strong></p>

<p>9. Staff on Duty at the Time of the Accident {{-- <strong>{{$accident->StaffOnDuty}}</strong> --}}</p>


<p>10. Name of person making this report: <strong>{{$accident->ReporterName}}</strong></p>

<p>11. Job Title: <strong>{{$accident->JobTitle}}</strong></p>

<div style="width: 100%;">
    <p style="float: left; width: 50%;">Date: <strong>{{ \Carbon\Carbon::parse($accident->DateOfReport)->format('d/m/Y') }}</strong></p>
    <p style="float: left; width: 50%;">.........................................................</p>
</div>

<p>&nbsp;</p>
<div style="width: 100%;margin-top:-50px">
    <p style="float: left; width: 50%;"></p>
    <p style="float: left; width: 50%;">Signature of Reporter</p>
</div>

<div class="page-break"></div>

<div style="width: 100%;">
    <p style="float: left; width: 50%;">.........................................................</p>
    <p style="float: left; width: 50%;">Date: </p>
</div>


<p>&nbsp;</p>
<div style="width: 100%;margin-top:-50px">
    <p style="float: left; width: 50%;">Signature of Chair of VOSC Committee</p>
    <p style="float: left; width: 50%;"></p>
</div>
<p>&nbsp;</p>
<p style="color: rgb(9, 9, 90)">
    <strong>Thank you for completing this report. A print copy is to be sent to the Occupational Health Unit- 3rd Floor, 
        Corporate Headquarters, 4-6 Queen’s Park East, Port-of-Spain, or a scanned copy is emailed to ohu@health.gov.tt
    </strong>
</p>

<p>Note that serious injuries are to be reported immediately. All other accidents are to be reported within 24 hours of occurrence.</p>

<p style="text-align: right"><strong>OHU/ARF Version 3. July 2024</strong></p>