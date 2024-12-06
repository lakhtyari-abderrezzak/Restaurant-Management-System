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
                                    <i class="fa-solid fa-chair"></i>Tables
                                </h3>
                                <a href="{{ route('tables.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                            <table class="table table-responsive-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Available</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tables as $table)
                                        <tr>
                                            <td class="font-weight-bold">{{ $table->id }}</td>
                                            <td><a href="{{route('tables.show', $table->slug)}}">{{ $table->name }}</a></td>
                                            <td>
                                                @if ($table->status)
                                                    <i class="fa-solid fa-check text-success"></i>
                                                @else
                                                    <i class="fa-solid fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-group d-flex justify-content-between">
                                                    <a href="{{ route('tables.edit', $table) }}" class="btn btn-warning">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('tables.destroy', $table) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
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
                                {{ $tables->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
