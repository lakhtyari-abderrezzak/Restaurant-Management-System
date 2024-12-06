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
                            <div class="d-flex flex-row justify-content-between border_bottom pb-1">
                                <h3 class="text-seccondary">
                                    <i class="fa-solid fa-chair"></i> {{ $servant->name }} 
                                    <p>Number of Sales: {{$servant->sales->count()}}</p>
                                </h3>
                            </div>
                            <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between ">
                                        <div class=""><span class="bold">Name:</span> {{ $servant->name }}</div>
                                        <div class=" text-align-right">Address:{{$servant->address}} </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    @foreach ($servant->sales as $sale)
                                        <div class="">
                                            <div>Sale ID: {{ $sale->id }}</div>
                                            <div>Servant ID: {{$sale->servant_id}}</div>
                                            <div>Sale Price: {{ $sale->price }}</div>
                                            <div>Sale Quantity: {{ $sale->quantity }}</div>
                                            <div>Sale Change: {{ $sale->change }}</div>
                                            <div>Sale Total: {{ $sale->total }}</div>
                                            <div>Payment Type: {{ $sale->payment_type }}</div>
                                            <div>Payment_status: {{ $sale->payment_status }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
