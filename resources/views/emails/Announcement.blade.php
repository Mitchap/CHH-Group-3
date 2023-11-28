<x-mail::message>
    <img src="{{ $message->embed(public_path('logo.png')) }}" alt="Logo" width="100">
    
# Dear CHH Members,

We have a new announcement and we would like
for you to check it out!.

<x-mail::button :url="'http://127.0.0.1:8000/memo_announcements'">
View Announcement
</x-mail::button>

Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
