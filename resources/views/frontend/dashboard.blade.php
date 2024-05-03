@extends('frontend.layouts.main')

@section('main-container')
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="margin-left: 50px">Welcome {{ auth()->user()->name }} To Brantum Technologies</h1>
                    <h4 style="margin-left: 50px">User Type = {{auth()->user()->user_type}}</h4>
                    <p style="margin-left: 50px">Agency to Inspire
                        Confidence and Build Trust</p>
                    <p style="margin-left: 50px">At Brantum Technologies, we aim to help you achieve your goals of
                        having and<br>
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
                    </table><br>
                    <h5>The total expense of company in month {{date('F')}} is <b>{{$total}}</b></h5><br>
                    <h5>The company owes the manager <b>{{$managertotal}}</b> Rupees only</h5>
                </div>
            </div>
        </div>
    </div>
    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1">Fix</span> EXPENSE</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Paid by</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($type as $type)
                            <tr>
                                <td>{{ ucwords($type->name) }}</td>
                                <td>
                                    @php $foundExpense = false; @endphp
                                    @foreach($monthlyExpenses as $expense)
                                        @if($expense->type_id == $type->id)
                                            Paid
                                            @php $foundExpense = true; break; @endphp
                                        @endif
                                    @endforeach
                                    @if(!$foundExpense)
                                        Not Paid
                                    @endif
                                </td>
                                <td>
                                    @php $foundExpense = false; @endphp
                                    @foreach($monthlyExpenses as $expense)
                                        @if($expense->type_id == $type->id)
                                            {{$expense->price}}
                                            @php $foundExpense = true; break; @endphp
                                        @endif
                                    @endforeach
                                    @if(!$foundExpense)
                                        0
                                    @endif
                                </td>
                                <td>
                                    @php $foundExpense = false; @endphp
                                    @foreach($monthlyExpenses as $expense)
                                        @if($expense->type_id == $type->id)
                                            {{ucwords($expense->team->name)}}
                                            @php $foundExpense = true; break; @endphp
                                        @endif
                                    @endforeach
                                    @if(!$foundExpense)
                                        -
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>


    <main></main>
@endsection
