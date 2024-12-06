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
                                    <i class="fa-solid fa-list"></i>Categories
                                </h3>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                            <table class="table table-responsive-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="font-weight-bold">{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <div class="form-group d-flex justify-content-between">
                                                    <a href="{{ route('categories.edit', $category->slug) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('categories.destroy', $category->slug)}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
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
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
