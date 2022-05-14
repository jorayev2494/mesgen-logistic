<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact sent</title>
</head>
    <body>
        Contact sent:
        @foreach($contact->toArray() as $property => $value)
            {{ $property }}: {{ $value }}.
        @endforeach
    </body>
</html>