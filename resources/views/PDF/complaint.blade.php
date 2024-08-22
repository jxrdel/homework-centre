
<img src="https://upload.wikimedia.org/wikipedia/commons/a/a1/Coat_of_arms_of_Trinidad_and_Tobago.svg" alt="Coat of Arms of Trinidad and Tobago" style="width: 200px; height: auto;">


<h2 style="text-align: center">Vacation and Out of School Centre (VOSC) Health and Safety Complaints Form</h2>

<p>Section 10(1)(c) of the OSH Act indicates as follows:</p>
<p><strong>
    "It shall be the duty of every employee while at work to report to his employer, any contravention under this Act or any Regulations made thereunder, the existence of which he knows"
    </strong>
</p>


<hr style="margin-top: 20px;border-top: 0.5px solid">

<p style="text-align: right">Date: <strong>{{ \Carbon\Carbon::parse($complaint->DateOfComplaint)->format('F jS, Y') }}</strong></p>

<p>To the:</p>

<ul>
    <li>VOSC Committee Representative</li>
    <li>Facilities Manager</li>
    <li>Health and Safety Committee Representative</li>
</ul>


<p>Please receive the following complaint about an: <strong>{{$complaint->ComplaintType}}</strong></p>

<p>Location where Unsafe Condition exists or where Unsafe Act occurred:</p>
<p><strong>{{$complaint->ComplaintLocation}}</strong></p>

<p style="margin-top: 40px">Details of complaint:</p>
<p><strong>{{$complaint->ComplaintDetails}}</strong></p>

<p style="margin-top: 40px">Any further information:</p>
<p><strong>{{$complaint->AdditionalInfo}}</strong></p>

<hr style="margin-top: 20px;border-top: 0.5px solid">

<p>Name of person making this report: <strong>{{$complaint->ReporterName}}</strong></p>

<div style="width: 100%;">
    <p style="float: left; width: 50%;">Phone: <strong>{{$complaint->ReporterTelNo}}</strong></p>
    <p style="float: left; width: 50%;">Extension: <strong>{{$complaint->ReporterExt}}</strong></p>
</div>

<p>Email: <strong>{{$complaint->ReporterEmail}}</strong></p>