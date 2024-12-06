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
                                <h3 class="text-secondary">
                                    <i class="fa-solid fa-clipboard-list mr-3"></i> Menus
                                </h3>
                                <a href="{{ route('menus.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                            <table class="table table-responsive-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td class="font-weight-bold">{{ $menu->id }}</td>
                                            <td>{{ $menu->title }}</td>
                                            <td>{{ Str::limit($menu->description,50) }}</td>
                                            <td>${{ $menu->price }}</td>
                                            <td><img src="{{$menu->image}}" alt="{{$menu->title}}" class="w-25"></td>
                                            <td>
                                                <div class="form-group d-flex justify-content-between gap-1">
                                                    <a href="{{ route('menus.edit', $menu) }}"
                                                        class="btn btn-warning mr-3">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('menus.destroy', $menu)}}" method="POST">
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
                                {{$menus->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
