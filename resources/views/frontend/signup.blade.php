
@extends('frontend.layouts.main')

@section('main-container')

    <div class="grid" style="margin-top: 20px; text-align: center;margin-right: 20px;">
        <form action="{{ route('sign.UP') }}" method="POST" class="form signup" >
            @csrf

            <div class="form__field"  >
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form__field"  >
                <label for="username">username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
            </div>

            <div class="form__field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form__field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form__field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            @if ($errors->any())
                <div class="text-red-500" style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form__field" style="margin-top:20px ">
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <div style="margin-top: 20px; text-align: center;margin-right: 20px;">
            have an account? <a href="{{ route('logpg') }}" style="color: blue;">Log In Now</a>
        </div>
    </div>
@endsection
