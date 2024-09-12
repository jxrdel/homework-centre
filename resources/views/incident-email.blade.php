<x-mail::message>

<p>Good day,</p>

<p>An incident report has been submitted to the Vacation and Out of School Centre (VOSC) Committee on {{ \Carbon\Carbon::parse($incident->DateOfReport)->format('F jS, Y') }}.</p>

<p>
    Please see the attached report below.
</p>

</x-mail::message>