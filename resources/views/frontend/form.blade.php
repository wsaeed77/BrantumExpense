@extends('frontend.layouts.main')

@section('main-container')






<div id="page-content-wrapper">
    <div class="container mt-5">
        <div class="row row-1">
            <div class="col-md-6">
                <h2 class="mb-4 text-dark form-heading"><span class="span-1">DAILY</span> EXPENDITURE</h2>
                <form>
                    <div class="form-group">
                        <label for="dropdown1" class="headings-1">Name</label>
                        <select class="form-control" id="dropdown1">
                            <option value="option1">Waqas</option>
                            <option value="option2">Hammad</option>
                            <option value="option3">Aqib</option>
                            <option value="option3">Hakeem</option>
                            <option value="option3">Sohail</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dropdown1" class="headings-1">Type</label>
                        <select class="form-control" id="dropdown1">
                            <option value="option1">Bill</option>
                            <option value="option2">Rent</option>
                            <option value="option3">Utilities</option>
                            <option value="option3">Food</option>
                            <option value="option3">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Price" class="headings-1">Price</label>
                        <input type="number" class="form-control" placeholder="Price" >
                    </div>
                    <div class="form-group">
                        <label for="message"  class="headings-1">Description</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
