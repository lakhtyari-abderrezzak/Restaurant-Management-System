@extends('layouts.master')


@section('content')
    <div class="home">
        <div class="container">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row justify-content-between border_bottom pb-1">
                                <h3 class="text-secondary">
                                    <i class="fa-solid fa-clipboard-list mr-3"></i> Sales
                                </h3>
                                <a href="{{ route('sales.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
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
                                        <th></th>
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
                                            <td>{{$sale->price}}</td>
                                            <td>{{$sale->total}}</td>
                                            <td>{{$sale->change}}</td>
                                            <td>{{$sale->payment_type}}</td>
                                            <td>{{$sale->status}}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{route('sales.edit', $sale->id)}}" class="btn btn-sm btn-warning">
                                                        <div class="fa-solid fa-edit"></div>
                                                    </a>
                                                    <form action="{{route('sales.destroy', $sale->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{$sales->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
