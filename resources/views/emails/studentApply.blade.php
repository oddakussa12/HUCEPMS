


@component('mail::message')
# {{ $details['title'] }}
  
Dear {{$details['user']}} you have successfully applied to haromaya university. 

We will let know now your acceptance after we review your application.
   
@component('mail::button', ['url' => $details['url']])
Visti Site
@endcomponent
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent