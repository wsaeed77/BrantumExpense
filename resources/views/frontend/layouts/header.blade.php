<!doctype html>
<html lang="en">

<head>
    <title>Brantum</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{url('frontend/css/form.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/overview.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div id="wrapper">


            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <img  class="logo1" src="{{url('frontend/img/brantum_tech_logo.jpeg')}}" alt="">

                  @if(auth()->check())
                    <li class="sidebar-brand">

                    <li>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('/form') }}">Form</a>
                    </li>
                    <li>
                        <a href="{{ url('/overview') }}">Overview</a>
                    </li>
                        <li>
                        <a href="#">Contact</a>
                    </li>

                    <li>
                        <a href="{{url('/logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
            @endif
            <!-- /#sidebar-wrapper -->
