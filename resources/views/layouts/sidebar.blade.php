<div class="row">
    <div class="col-sm-12 mb-3">
        <a href="/" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
</div>
<ul class="list-group mb-3">
    <x-a href="{{route('categories.index')}}" 
    :active="request()->is('categories')">
        <i class="fa-solid fa-list mr-3" ></i>
        Categories
    </x-a>
    <x-a href="{{route('servants.index')}}" 
    :active="request()->is('servants')">
        <i class="fa-solid fa-users mr-3"></i>
        Servants
    </x-a>
    <x-a href="{{route('tables.index')}}" 
        :active="request()->is('tables')" >
        <i class="fa-solid fa-chair mr-3"></i>
        Tables
    </x-a>
    <x-a href="{{route('menus.index')}}" 
    :active="request()->is('menus')">
        <i class="fa-solid fa-clipboard-list mr-3"></i>
        Menu
    </x-a>
</ul>
