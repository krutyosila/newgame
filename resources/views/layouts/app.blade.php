<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>ByTombala</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/elements/alert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/forms/switches.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/pricing-table/css/component.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css">
    @stack('css')
</head>
<body class="sidebar-noneoverflow">

@include('layouts.header')

<div class="main-container" id="container">

    @include('layouts.topbar')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            @include('layouts.alerts')
            <div class="pb-4">
                @yield('content')
            </div>
        </div>
        <div class="layout-px-spacing">
            <div class="rounded-10 p-4" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.04)">
                <div class="small">
                    Copyright &copy; {{ date('Y') }} - BingoLive
                </div>
                <div class="pt-3">
                    <a href="{{ route('page', ['page' => 'howto']) }}">Nasıl Oynanır</a>
                    -
                    <a href="{{ route('page', ['page' => 'rules']) }}">Oyun Kuralları</a>
                    -
                    <a href="{{ route('page', ['page' => 'follow-card']) }}">Kart Takip Nedir ?</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('html')

<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
        @auth

        @endauth
    });
</script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@stack('js')
</body>
</html>
