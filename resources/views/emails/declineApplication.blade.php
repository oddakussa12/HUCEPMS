@component('mail::message')
# {{ $details['title'] }}
  
Dear {{$details['user']}} after reviewing your application form, We have declined your request to join our university. 
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent