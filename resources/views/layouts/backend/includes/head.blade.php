<!DOCTYPE html>
<html lang="en" dir="{{ App::getLocale() == 'ar' ? 'rtl' : '' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ env('APP_NAME') }}@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

    <!-- css -->
    @if(App::getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/rtl.css') }}" />
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/ltr.css') }}" />
    @endif
    @yield('css')
