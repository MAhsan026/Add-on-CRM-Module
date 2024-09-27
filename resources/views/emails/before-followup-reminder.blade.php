<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Before Followup Reminder</h1>
    <p>Dear {{ $admin->name }},</p>
    <p>This is a reminder to follow up on the task titled "{{ $reminder->title }}" with the following details:</p>
    <ul>
        <li>Description: {{ $reminder->description }}</li>
        <li>Due Date: {{ $reminder->due_date }}</li>
    </ul>
    <p>Please take appropriate action as soon as possible.</p>
    <p>Thank you.</p>
    <p>Best regards,</p>
    <p>{{ $admin->name }}</p>
</body>

</html>