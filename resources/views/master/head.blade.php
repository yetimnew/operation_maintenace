<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yetimeshet Tadese yetimnew@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <title>@yield('title','TIMS')</title>

    <!-- Font Awesome CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.default.css')}}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/buttons.dataTables.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('/css/fontawesome.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/fontastic.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/icons-reference/styles.css')}}">
    @yield('styles')