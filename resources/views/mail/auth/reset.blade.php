<x-mail::message>
    # Introduction

    Blood Bank Reset Password

    <x-mail::button :url="''">
        Reset Password
    </x-mail::button>




    <p>Your reset code is : {{ $code }}</p>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
