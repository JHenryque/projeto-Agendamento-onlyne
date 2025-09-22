<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ auth()->user()->empreendedor->logomarca ?? 'AGE-ONLYNE' }} @isset($title) - {{ $title }} @endisset</title>
    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    <!-- resources -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/stylles.css') }}">
    <link href="{{ asset('assets/css/media.css') }}" rel="stylesheet">
</head>

<body>

    @php
        $pdo = \Illuminate\Support\Facades\DB::connection()->getPdo();
    @endphp


    @if($pdo->beginTransaction())

        <x-user-bar />
        <div class="d-flex gap-3" style="min-height: 860px;">
            <x-side-bar />
            <div class="w-100 mt-3 justify-content-center">
                {{ $slot }}
            </div>
        </div>


    @else
        <div class="container w-100 vh-100 align-content-center">
            <div class="row justify-content-center text-bg-light rounded align-content-center" style="height: 800px">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="d-flex justify-content-center my-5">
                    Não foi possível conectar ao banco ❌
                </div>
            </div>
        </div>
    @endif

<!-- resources -->
<script src="{{ asset('assets/datatables/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
