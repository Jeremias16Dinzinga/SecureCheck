<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard!</h1>
    <p>This is a protected page. Only authenticated users can access it.</p>
    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>
