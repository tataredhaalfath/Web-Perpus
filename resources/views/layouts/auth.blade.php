<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titile')</title>

    @include('includes.style')

</head>

<body class="bg-gradient-primary" style="background:#9c9c9c">
    @yield('content')
    @include('includes.script')
</body>

</html>
