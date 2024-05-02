@extends('frontend.layouts.main')

@section('main-container')



    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row row-1">
                <div class="col-md-6">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1">FIXED</span>EXPENSE</h2>
                    <form method="POST" action="{{ route('fixed.save') }}">
                        @csrf
                            <div class="form-group">
                                <label for="input" class="headings-1">Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="price" class="headings-1">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1"></span>Fixed expense</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Is paid<th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fixexpense as $fix)
                            <tr>
                                <td>{{ $fix->name }}</td>
                                <td>{{ $fix->price }}</td>
                                <td>{{ $fix->created_at }}</td>
                                <td>{{$fix->is_paid}}</td>
                                <td>
                                    @if($fix->is_paid == false)
                                    <form action="{{ route('fixed.pay', $fix->id) }}" method="POST" style="">
                                        @csrf
                                        <button type="submit" class="btn btn-dark delete-btn">PAY
                                        </button>
                                    </form>
                                    @else
                                        <p>PAID BY: {{ $fix->user->name }}</p>
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




@endsection
