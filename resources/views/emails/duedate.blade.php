<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Reminder</h1>
    <p>The followup for {{ $reminder->name }} is due on {{ $reminder->due_date }}</p>
</body>

</html>
