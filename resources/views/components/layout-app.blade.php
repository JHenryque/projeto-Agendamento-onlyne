<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento-Onlyne @isset($title) - {{ $title }} @endisset</title>
    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <!-- resources -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/stylles.css') }}">
</head>

<body>


        <x-user-bar />
        <div class="d-flex gap-3" style="min-height: 860px;">
            <x-side-bar />
            <div class="w-100 mt-3 justify-content-center">
                {{ $slot }}
            </div>
        </div>


<!-- resources -->
<script src="{{ asset('assets/datatables/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
