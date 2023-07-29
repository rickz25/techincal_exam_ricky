<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('dist/js/jquery-3.7.0.js') }}"></script>

    <style>
        h1 {
            font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
            font-size: 35px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: #0e0f0f;
            font-weight: 700;
            text-decoration: none;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            font-family: 'Lato', sans-serif;
        }

        .lds-facebook {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-facebook div {
            display: inline-block;
            position: absolute;
            left: 8px;
            width: 16px;
            background: #0B5ED7;
            animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }

        .lds-facebook div:nth-child(1) {
            left: 8px;
            animation-delay: -0.24s;
        }

        .lds-facebook div:nth-child(2) {
            left: 32px;
            animation-delay: -0.12s;
        }

        .lds-facebook div:nth-child(3) {
            left: 56px;
            animation-delay: 0;
        }

        @keyframes lds-facebook {
            0% {
                top: 8px;
                height: 64px;
            }

            50%,
            100% {
                top: 24px;
                height: 32px;
            }
        }
        .btn-add{
            width: 15%;
        }
        .box img {
            width: 15%;
            height: 15%;
        }
        .image img {
            object-fit: cover;
        }
    </style>
</head>

<body>
