@component('mail::message')
# Welcome to my Blog

I would like to thank you for reading the articles
@component('mail::button', ['url' => env('APP_URL')])
Visit site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
