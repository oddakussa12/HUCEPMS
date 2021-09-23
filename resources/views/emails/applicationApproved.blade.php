


@component('mail::message')
# {{ $details['title'] }}
  
Dear {{$details['user']}} after reviewing your application form, We have approved your request to join our university. 
<p>Please use the following credentials to log in to the system.</p> 
<p>User name: <b>{{$details['email']}}</b></p>
<p>Password: <b>1234</b></p>
   
@component('mail::button', ['url' => $details['url']])
Visti Site
@endcomponent
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent