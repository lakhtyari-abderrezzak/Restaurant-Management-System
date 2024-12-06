@extends('layouts.master')

@section('content')
<div class="home">
    <div class="container">
        <div class="card bg-light">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @include('layouts.sidebar')
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex flex-row justify-content-between border-bottom pb-3">
                            <h3 class="text-seccondary ">
                                <i class="fa-solid fa-plus pr-2"></i>Add New Table
                            </h3>
                        </div>
                        <form action="{{route('tables.store')}}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                 placeholder="Enter name" value="{{old('name')}} " 
                                 >
                                 @error('name')
                                 <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="status">Status: </label>
                                <select name="status" class="form-control">
                                    <option selected disabled>Available</option>
                                    <option value="1" >Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                                 @error('status')
                                 <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection