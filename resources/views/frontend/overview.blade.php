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
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1">OVERVIEW</span> EXPENDITURE</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Data and Time</th>
                            <th>Created by</th>
                            @if(\Illuminate\Support\Facades\Auth::check() && auth()->user()->user_type == 'super' || auth()->user()->user_type == 'manager')

                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entries as $entry)
                            <tr>
                                <td>{{ $entry->team->name }}</td>
                                <td>{{ $entry->type }}</td>
                                <td>{{ $entry->price }}</td>
                                <td>{{ $entry->description }}</td>
                                <td>{{$entry->created_at}}</td>
                                <td>{{$entry->user->name}}</td>
                                @if(\Illuminate\Support\Facades\Auth::check() && auth()->user()->user_type == 'super'|| auth()->user()->user_type == 'manager')

                                <td>
                                    <form action="{{ route('entry.edit', $entry->id) }}" method="GET" style="">
                                        @csrf
                                        <button type="submit" class="btn btn-dark delete-btn"
                                        >Edit</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('entry.destroy', $entry->id) }}" method="POST" style="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this entry?')"
                                        >Delete</button>
                                    </form>
                                </td>
                                @endif

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
