@extends('frontend.layouts.main')

@section('main-container')
    <div id="page-content-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="mb-4 text-dark form-heading"><span class="span-1">EDIT</span> ENTRY</h2>
                    <form action="{{ route('entry.update', $entry->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="dropdown1" class="headings-1">Name</label>
                            <select class="form-control" id="dropdown1" name="team_id">
                                @foreach($team as $teamMember)
                                    <option value="{{ $teamMember->id }}" {{ $entry->team_id == $teamMember->id ? 'selected' : '' }}>
                                        {{ $teamMember->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="dropdown2" class="headings-1">Type</label>
                                <select class="form-control" id="dropdown2" name="type">
                                    <option value="Bill" {{ $entry->type == 'Bill' ? 'selected' : '' }}>Bill</option>
                                    <option value="Rent" {{ $entry->type == 'Rent' ? 'selected' : '' }}>Rent</option>
                                    <option value="Utilities" {{ $entry->type == 'Utilities' ? 'selected' : '' }}>Utilities</option>
                                    <option value="Food" {{ $entry->type == 'Food' ? 'selected' : '' }}>Food</option>
                                    <option value="Others" {{ $entry->type == 'Others' ? 'selected' : '' }}>Others</option>
                                </select>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $entry->price }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $entry->description}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
