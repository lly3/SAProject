{{-- resources/views/layouts/main.blade.php --}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logo_no_text.png') }}">
    <title>
        HeartbeatPetition ระบบร้องเรียนออนไลน์มหาวิทยาลัยเกษตรศาสตร์
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts._navbar')

    <div class='mx-auto max-w-6xl w-11/12'>
        @yield('content')
    </div>

    @include('layouts._footer')
</body>
</html>
