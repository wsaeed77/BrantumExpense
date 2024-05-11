@extends('frontend.layouts.main')

@section('main-container')

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6" style="margin-top: 100px">
                <div class="card">
                    <div class="card-header" >Sign Up</div>
                    <div class="card-body">
                        <form action="{{ route('sign.UP') }}" method="POST" class="form" >
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>
                        <div class="mt-3">
                            Already have an account? <a href="{{ route('logpg') }}" class="text-primary">Log In Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
