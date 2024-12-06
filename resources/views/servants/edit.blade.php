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
                                    <i class="fa-solid fa-edit"></i>Update {{ $servant->name }}
                                </h3>
                            </div>
                            <form action="{{ route('servants.update', $servant) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-2">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter name" value="{{ old('name') }} ">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ old('address') }} " placeholder="Enter address">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
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
