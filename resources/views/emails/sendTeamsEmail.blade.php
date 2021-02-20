@component('mail::message')
# 
<p>{{ $message }} </p>

Att: {{ auth()->user()->nom }}
@endcomponent
