<style>
    .page-break {
        page-break-after: always;
    }
</style>

<div style="text-align: center;margin-top:-40px">
    <img src="{{ public_path('mohlogo.png') }}" alt="Coat of Arms of Trinidad and Tobago" style="width: 300px; height: auto;">
</div>


<div style="width:80%;margin:auto">
    <h3 style="text-align: center;">Vacation and Out of School Centre (VOSC) Health and Safety Incident Form</h3>
</div>


<div style="width:90%;margin:auto;margin-top:-20px">
    <p style="text-align: center;">
        For reporting of unplanned events at work that had the potential to result in injury to a child, employee or member of the public, or damage to facilities, vehicles or equipment.
    </p>
</div>

<p style="margin-top: 50px">1. Name of person making this report: <strong>{{$incident->ReporterName}}</strong></p>
<p>2. Job Title & Department : <strong>{{$incident->JobTitle}}, Vacation & Out of School Centre</strong></p>
<p>3. Telephone Extension: <strong>{{$incident->ExtNo}}</strong></p>

<p style="text-decoration: underline">Details of Incident</p>

<p>4. Where did the incident / dangerous occurrence happen: <strong>{{$incident->IncidentLocation}}</strong></p>

<p>5. Date & Time of Incident: <strong>{{ \Carbon\Carbon::parse($incident->TimeOfIncident)->format('l jS F, Y h:i a') }}</strong></p>

<p>6. Brief description of incident / dangerous occurrence: <strong>{{$incident->IncidentDescription}}</strong></p>


<p>&nbsp;</p>
<p style="color: rgb(9, 9, 90)">
    <strong>N.B. Incidents / Dangerous Occurrences include: security breaches, violent or aggressive behaviour, 
        medical events at work not necessarily caused by work, near misses and other unplanned events that had the potential 
        to cause bodily injury, illness, or damage to property, equipment or vehicles.
    </strong>
</p>

<p>&nbsp;</p>

<div style="width: 100%;">
    <p style="float: left; width: 50%;">Date: <strong>{{ \Carbon\Carbon::parse($incident->DateOfReport)->format('d/m/Y') }}</strong></p>
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

<p style="text-align: right"><strong>OHU/IRF Version 3. July 2024</strong></p>