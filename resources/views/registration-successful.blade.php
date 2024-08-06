<x-mail::message><p>Hello {{$user->FirstName}}!</p>

<p>Welcome to the Vacation & Out-of-School Center!</p>

<p>
@if($user->HasWindowsLogin == 1 || $user->HasWindowsLogin == true)
    Your username is <strong>{{$user->Username}}</strong> and your password is the same as your Windows password.
@else
    Please note that because you do not have a Windows login, you will need to contact the VOSC Administrator to make all bookings.
@endif
</p>
<p>If you need assistance, please contact the VOSC Administrator at extension 15581.</p>

<x-mail::button :url="$url">Login</x-mail::button>

</x-mail::message>