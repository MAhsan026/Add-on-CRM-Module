<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>On Create Reminder</h1>
    <p>Dear {{ $admin->name }},</p>
    <p>You have an upcoming followup scheduled for {{ $reminder->date_time }}.</p>
    <p>Details: {{ $reminder->details }}.</p>
    <p>Please take appropriate action as soon as possible.</p>
    <p>Thank you.</p>
    <p>Best regards,</p>
    <p>{{ $admin->name }}</p>
</body>

</html>