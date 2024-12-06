@extends('layouts.master')

@section('content')
    <div class="home">
        <div class="container">
            <div class="card bg-light">
                <div class="card-body">
                    @auth
                        <div class="row">
                            <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-gear fa-5x text-danger mb-4"></i>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary font-weight-bold">
                                    Manage
                                </a>
                            </div>
                            <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-cart-shopping fa-5x text-danger mb-4"></i>
                                <a href="{{ route('sales.index') }}" class="btn btn-secondary font-weight-bold">
                                    Sales
                                </a>
                            </div>
                            <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-clipboard fa-5x text-danger mb-4"></i>
                                <a href="{{ route('reports.index') }}" class="btn btn-secondary font-weight-bold">
                                    Reports
                                </a>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <h1 class="font-weight-bold font-size-4 text-center text-danger">
                            <i class="fa-solid fa-burger x-5"></i>
                            Restaurant Management
                            <i class="fa-solid fa-chair x-5"></i>

                        </h1>
                    @endguest
                </div>
            </div>
        </div>
    </div>
@endsection
