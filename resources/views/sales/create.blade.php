@extends('layouts.master')

@section('content')
    <div class="home" id="reports">
        <div class="container">
            <form action="{{ route('sales.store') }}" method="POST" id=add-sale>
                @csrf
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12 mb-3">
                                                <a href="/" class="btn btn-outline-secondary">
                                                    <i class="fa-solid fa-house"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="list-group mb-3">
                                            <x-a href="{{ route('sales.index') }}" :active="request()->is('sales')">
                                                <i class="fa-solid fa-list mr-3"></i>
                                                Sales
                                            </x-a>
                                            <x-a href="{{ route('sales.create') }}" :active="request()->is('sales/create')">
                                                <i class="fa-solid fa-users mr-3"></i>
                                                Add Sale
                                            </x-a>
                                           
                                        </ul>
                                    </div>
                                    <div class="col-sm-10 d-flex flex-column ">
                                        <h3 class="muted-text border-bottom">{{ \carbon\carbon::now() }}</h3>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach ($tables as $table)
                                                        <div class="col-sm-3">
                                                            <div
                                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center  gap-2">
                                                                <div
                                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                                    <input type="checkbox" name="table_id[]" id=""
                                                                        value="{{ $table->id }}">
                                                                    <i class="fa-solid fa-chair fa-5x mt-2"></i>
                                                                    <span class="mt-2 text-muted font-weight-bold">
                                                                        {{ $table->name }}
                                                                    </span>
                                                                    <a href="{{ route('sales.edit', $table->slug) }}"
                                                                        class="btn btn-warning mt-2">
                                                                        <i class="fa-solid fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                @foreach ($table->sales as $sale)
                                                                    @if ($sale->created_at >= Carbon\Carbon::today())
                                                                        <hr class="w-75">
                                                                        <div class="my-2 w-100 shadow"
                                                                            id="{{ $sale->id }}">
                                                                            <div class="card" style="border: dashed pink">
                                                                                <div
                                                                                    class="card-body d-flex flex-column justify-content-center align-items-center">
                                                                                    @foreach ($sale->menus()->where('sale_id', $sale->id)->get() as $menu)
                                                                                        <h5 class="font-weight-bold">
                                                                                            {{ $menu->title }}
                                                                                        </h5>
                                                                                        <h5 class="text-muted">
                                                                                            {{ $menu->price }}$
                                                                                        </h5>
                                                                                    @endforeach
                                                                                    <h5 class="font-weight-bold mt-2">
                                                                                        <span class="badge bg-danger">
                                                                                            {{ $sale->servant->name }}
                                                                                        </span>
                                                                                    </h5>
                                                                                    <h5 class="font-weight-bold mt-2">
                                                                                        <span class="badge bg-secondary">
                                                                                            Qty: {{ $sale->quantity }}
                                                                                        </span>
                                                                                    </h5>
                                                                                    <div class="mt-2">
                                                                                        <span
                                                                                            class="badge bg-light text-dark">
                                                                                            Total: {{ $sale->total }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <span
                                                                                            class="badge bg-light text-dark">
                                                                                            Change: {{ $sale->change }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <span
                                                                                            class="badge bg-light text-dark">
                                                                                            Payment Status:
                                                                                            {{ $sale->payment_status }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <span
                                                                                            class="badge bg-light text-dark">
                                                                                            Payment Type:
                                                                                            {{ $sale->payment_type }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center gap-2">
                                                                            <a href="{{ route('sales.edit', $sale->id) }}"
                                                                                class="btn btn-sm btn-warning mr-2">
                                                                                <i class="fa-solid fa-edit"></i>
                                                                            </a>
                                                                            <a href="#" target="_blank"
                                                                                onclick="print({{ $sale->id }})"
                                                                                class="btn btn-sm btn-primary">
                                                                                <i class="fa-solid fa-print"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @error('table_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-12 card p-3">
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                            @foreach ($categories as $category)
                                <li class="nav-item m-2">
                                    <a href="#{{ $category->slug }}"
                                        class="nav-link {{ $category->slug == 'drinks' ? 'active' : '' }}"
                                        id="{{ $category->slug }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#{{ $category->slug }}" role="tab"
                                        aria-controls="{{ $category->slug }}"
                                        aria-selected="true">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabcontent">
                            @foreach ($categories as $category)
                                <div class="tab-pane fade {{ $category->slug === 'drinks' ? 'show active' : '' }}"
                                    id="{{ $category->slug }}" role="tabpanel"
                                    aria-labelledby="{{ $category->slug }}-tab">
                                    <div class="row">
                                        @foreach ($category->menus as $menu)
                                            <div class="col-md-4 mb-2">
                                                <div class="card h-100">
                                                    <div
                                                        class="card-body d-flex flex-column 
                                                        justify-content-center align-items-center">
                                                        <div class="align-self-end">
                                                            <input type="checkbox" name="menu_id[]" id="menu_id"
                                                                value="{{ $menu->id }}">
                                                        </div>
                                                        <img src="{{ $menu->image }}" alt="{{ $menu->title }}"
                                                            width="100" height="100"
                                                            class="img-fluid rounded-circle">
                                                        <h5 class="font-weight-bold mt-2">
                                                            {{ $menu->title }}
                                                        </h5>
                                                        <h5 class="font-weight-bold mt-2">
                                                            ${{ $menu->price }}
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('menu_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            @endforeach
                            <div class="row mt-4">
                                <div class="col-md-6 mx-auto">
                                    <div class="form-group mb-2">
                                        <label for="servant">Servant: </label>
                                        <select name="servant_id" id="servant" class="form-control">
                                            <option value="" selected disabled>Servant</option>
                                            @foreach ($servants as $servant)
                                                <option value="{{ $servant->id }}">{{ $servant->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('servant_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="number" name="quantity" placeholder="Quantity"
                                            value="{{ old('quantity') }}" class="form-control">
                                        @error('quantity')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="number" name="price" placeholder="Price"
                                            value="{{ old('price') }}" class="form-control">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="number" name="total" placeholder="Total"
                                            value="{{ old('total') }}" class="form-control">
                                        @error('total')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="number" name="change" placeholder="Change"
                                            value="{{ old('change') }}" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <select name="payment_type" class="form-control">
                                            <option value="" selected disabled>Cash</option>
                                            <option value="cash">Cash</option>
                                            <option value="card">Card</option>
                                        </select>
                                        @error('payment_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <select name="payment_status" class="form-control">
                                            <option value="" selected disabled>Unpaid</option>
                                            <option value="unpaid">Unpaid</option>
                                            <option value="paid">Paid</option>
                                        </select>
                                    </div>
                                    <div class="form-gorup">
                                        <button
                                            onclick="event.preventDefault();
                                                    document.getElementById('add-sale').submit()"
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function print(el) {
            const restorePage = document.body.innerHTML;
            const printContent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorePage;
        }
    </script>
@endsection
