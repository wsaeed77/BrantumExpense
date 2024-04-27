@extends('frontend.layouts.main')

@section('main-container')

    <head>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    </head>


    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1">{{ ucwords($teamMember->name) }}</span> EXPENDITURE</h2>
                    <table class="table">
                        <thead>

                        <tr>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Data and Time</th>
                            <th>Created by</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teamExpenses as $expense)
                            <tr>
                                <td>{{ $expense->type }}</td>
                                <td>{{ $expense->price }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{$expense->created_at}}</td>
                                <td>{{$expense->user->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

    </script>

@endsection
