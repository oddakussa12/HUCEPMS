@component('mail::message')
# {{ $detail['title'] }}
  
Dear {{ $detail['user'] }},We are sorry, We can't approve your receipt right now.
<p>Please try uploading your receipt again.</p>

   
@component('mail::button', ['url' => $detail['url']])
Visti Site
@endcomponent
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent