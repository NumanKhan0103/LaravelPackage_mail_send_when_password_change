<x-mail::message>
# Introduction

The password for your account was recently changed.

please contact {{ config('app.name') }} team if you did not initiate this change.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
