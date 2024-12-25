<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Verification</title>
</head>
<body>
    {{-- <h4>Dear {{ $data['user']->name }},</h4>
    <p>
        Welcome to {{config('app.name')}}! We're delighted to have you join our community of sellers.
    </p>
    <p>
        Your {{config('app.name')}} website registration request has been sent. Your request is under verification. Please wait for a verification message.
    </p>
    <p>
        Best regards,
    </p>
    <p>
        {{config('app.name')}}
    </p> --}}
<p>
    Congratulations on your registration at EOTC. Your Login User Name:{{ $data['user']->name }}  Your Site URL: {{ $data['user']->user_name.config('app.main_url') }}

</p>

</body>
</html>
