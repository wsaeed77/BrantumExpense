@extends('frontend.layouts.main')

@section('main-container')

    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row row-1">
                <div class="col-md-6">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1">DAILY</span> EXPENDITURE</h2>
                    <form method="POST" action="{{ route('formfill.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="dropdown1" class="headings-1">Name</label>
                            <select class="form-control" id="dropdown1" name="name">
                                @foreach($teams as $id => $name)
                                    <option value="{{ $id }}">{{ ucwords($name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dropdown2" class="headings-2">Type</label>
                            <select class="form-control" id="dropdown2" name="type">
                                @foreach($expensestype as $id => $name)
                                    <option value="{{ $id }}">{{ ucwords($name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price" class="headings-1">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                   name="price" placeholder="Price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message" class="headings-1">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="message"
                                      name="description" rows="3" placeholder="Enter your message"></textarea>
                            @error('description')
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

@endsection
