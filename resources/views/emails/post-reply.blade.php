<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Hi, {{ $recipient->name }}!</h1>
    <h3>
        You got a reply from <a href="http://127.0.0.1:8000/{{ $sender->username }}">{{ $sender->name }}</a>.
    </h3>
</body>
</html>
