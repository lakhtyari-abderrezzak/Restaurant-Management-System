@extends('layouts.master')

@section('content')
    <div class="home">
        <div class="container">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 sahdow-sm d-flex flex-column align-items-center justify-content-center">
                            <form action="{{ route('reports.show') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="from">Start Date</label>
                                    <input type="date" name="from" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="to">End Date</label>
                                    <input type="date" name="to" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Display Reports
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    @isset($total)
                        <div class="row my-4">
                            <div class="col-md-10 mx-auto">
                                <h4 class="font-weight-bold text-secondary">
                                    Report From {{ $startDate }} To {{ $endDate }}
                                </h4>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-responsive-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Menu</th>
                                                    <th>Table</th>
                                                    <th>Waiter</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                    <th>Change</th>
                                                    <th>Payment Type</th>
                                                    <th>Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $sale)
                                                    <tr>
                                                        <td>{{$sale->id}}</td>
                                                        <td>
                                                            @foreach ($sale->menus as $menu)
                                                                {{$menu->title}}
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($sale->tables as $table)
                                                                {{$table->name}}
                                                            @endforeach
                                                        </td>
                                                        <td>{{$sale->servant->name}}</td>
                                                        <td>{{$sale->quantity}}</td>
                                                        <td>{{$sale->total}}</td>
                                                        <td>{{$sale->change}}</td>
                                                        <td>{{$sale->payment_type}}</td>
                                                        <td>{{$sale->payment_status}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p class="text-danger text-center font-weight-bold">
                                            <span class="border border-danger p-2">
                                                Total: ${{$total}}
                                            </span>
                                        </p>
                                        <form action="{{route('reports.export')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="from" value="{{$startDate}}">
                                            <input type="hidden" name="to" value="{{$endDate}}">
                                            <div class="from-group">
                                                <button type="submit" class="btn btn-primary">
                                                    Export to Excel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
