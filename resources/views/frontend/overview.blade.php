@extends('frontend.layouts.main')

@section('main-container')

    <head>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    </head>



    <div class="mb-3">
        <label for="year-select" class="form-label">Select Year:</label>
        <select class="form-select" id="year-select">
            <option value="2026">2026</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="month-select" class="form-label">Select Month:</label>
        <select class="form-select" id="month-select">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div>
    <button id="fetch-entries-btn" class="btn btn-primary">Fetch Entries</button>

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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entries as $entry)

                            <tr>
                                <td>{{ ucwords($entry->team->name) }}</td>
                                <td>{{ucwords($entry->type->name)  }}</td>
                                <td>{{ $entry->price }}</td>
                                <td>{{ $entry->description }}</td>
                                <td>{{$entry->created_at}}</td>
                                <td>{{$entry->user->name}}</td>
                                <td>
                                    <form action="{{ route('entry.edit', $entry->id) }}" method="GET" style="">
                                        @csrf
                                        <button type="submit" class="btn btn-dark delete-btn"
                                        >Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('entry.destroy', $entry->id) }}" method="POST" style="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this entry?')"
                                        >Delete
                                        </button>
                                    </form>
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
        $(document).ready(function () {
            var dataTable = $('.table').DataTable({
                columns: [
                    {data: 'name'},
                    {data: 'type'},
                    {data: 'price'},
                    {data: 'description'},
                    {data: 'created_at'},
                    {data: 'created_by'},
                    {data: 'edit'},
                    {data: 'delete'},
                ],
            });

            function fetchEntries(month, year) {
                $.ajax({
                    url: '{{ route("fetch.entries") }}',
                    type: 'GET',
                    data: {month: month, year: year},
                    success: function (data) {
                        console.log('Received data:', data);
                        data.entries.forEach(function (entry) {
                            entry.edit = '<a href="' + entry.edit + '" class="btn btn-dark delete-btn">Edit</a>';
                            entry.delete = '<button class="btn btn-danger delete-entry-btn" data-id="' + entry.id + '">Delete</button>';

                        });


                        dataTable.clear().rows.add(data.entries).draw();
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            $('#fetch-entries-btn').click(function () {
                var selectedMonth = $('#month-select').val();
                var selectedYear = $('#year-select').val();
                fetchEntries(selectedMonth, selectedYear);
            });
            $('.table').on('click', '.delete-entry-btn', function () {
                var entryId = $(this).data('id');
                if (confirm('Are you sure you want to delete this entry?')) {
                    deleteEntry(entryId);
                }
            });

            function deleteEntry(entryId) {

                $.ajax({
                    url: ' /delete-entry/' + entryId,
                    type: 'DELETE',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function (response) {
                        $('#entry_' + entryId).remove();
                        window.location.href = '{{ route("overview.expenditure") }}';
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 405) {
                            $('#entry_' + entryId).remove();
                            window.location.href = '{{ route("overview.expenditure") }}';

                        } else {
                            console.error('Error deleting entry:', error);
                        }
                    }
                });
            }
        });
    </script>

@endsection
