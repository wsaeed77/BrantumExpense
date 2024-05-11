@extends('frontend.layouts.main')

@section('main-container')


    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1"></span>Unapproved Users</h2>
                    <table class="table">
                        <thead>

                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Actions<th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($unapprovedUsers as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{$user->user_type}}</td>
                                <td>
                                    <form action="{{ route('submit.approval', $user->id) }}" method="POST" style="">
                                        @csrf
                                        <button type="submit" class="btn btn-dark delete-btn"
                                        >Approve
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">Delete</button>
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




@endsection



