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
                                <i class="fa-solid fa-plus"></i>Categories
                            </h3>
                        </div>
                        <form action="{{route('categories.store')}}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" name="title" id="title" class="form-control"
                                 placeholder="Enter Title" value="{{old('title')}} " 
                                 >
                                 @error('title')
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