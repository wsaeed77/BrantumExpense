@extends('frontend.layouts.main')

@section('main-container')
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style="margin-left: 50px">Welcome {{ auth()->user()->name }} To Brantum Technologies</h1>
                            <h4 style="margin-left: 50px">User Type =  {{auth()->user()->user_type}}</h4>
                            <p style="margin-left: 50px">Agency to Inspire
                                Confidence and Build Trust</p>
                            <p style="margin-left: 50px">At Brantum Technologies, we aim to help you achieve your goals of having and<br>
                                maintaining your digital presence with a custom website.
                                </p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="page-content-wrapper">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="mb-4 text-dark form-heading"><span class="span-1">OWNERS</span> EXPENSE</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total Expense</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teamsWithExpenses as $team)
                                    <tr>
                                        <td><a href="{{ route('team.details', $team->id) }}">{{ucwords( $team->name) }}</a></td>

                                        <td>{{ $team->expenses_sum_price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h5>The total expense of company in month {{date('F')}} is <b>{{$total}}</b></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div id="page-content-wrapper">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="mb-4 text-dark form-heading"><span class="span-1">Fix</span>EXPENSE</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($type as $type)
                                    <tr>
                                        <td>({{ucwords($type->name)}}</td>

                                        <td>hello</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h5>The total expense of company in month {{date('F')}} is <b>{{$total}}</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>


            <main></main>
@endsection
