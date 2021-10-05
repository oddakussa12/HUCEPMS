


@component('mail::message')
# {{ $detail['title'] }}
  
Dear {{ $detail['user'] }}, after reviewing your receipt, We have activated your account.
<p>Please login to your dashboard by clicking below button.</p>

   
@component('mail::button', ['url' => $detail['url']])
Visti Site
@endcomponent
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent