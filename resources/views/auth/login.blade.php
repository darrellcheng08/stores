<!doctype html>
<html lang="{{ app()->getLocale() }}" id="scroll-bar">

<head>
    <meta name="theme-color" content="#0288d1" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stores - Login</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="app">
        <router-view></router-view>
    </div>

    <script src="{{ mix('/js/login.js') }}"></script>
</body>

</html>
