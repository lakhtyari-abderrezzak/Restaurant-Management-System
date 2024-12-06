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
                                <i class="fa-solid fa-plus pr-2"></i>Add New Menu
                            </h3>
                        </div>
                        <form action="{{route('menus.update', $menu->slug)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="title">title:</label>
                                <input type="text" name="title" id="title" class="form-control"
                                 placeholder="Enter title" value="{{$menu->title}} " 
                                 >
                                 @error('title')
                                 <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Description:</label>
                                 <textarea name="description" id=""  placeholder="Describe Menu Breifly"
                                 class="form-control">{{$menu->description}}</textarea>
                                 @error('description')
                                 <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">Price:</label>
                                <input type="text" name="price" id="price" class="form-control"
                                 placeholder="Enter price" value="{{$menu->price}} " 
                                 >
                                 @error('price')
                                 <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                            <div class="pb-2 pt-2">
                                <img src="{{$menu->image}}" alt="" class="w-50 rounded">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image">Image :</label>
                                <input type="file" name="image" id="">
                                 @error('image')
                                 <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="category_id">Choose Category :</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected disabled>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option {{$category->id === $menu->category_id ? 'selected': ''}}
                                            value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
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