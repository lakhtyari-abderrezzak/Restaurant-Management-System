@props(['href', 'active' => false])
<a href="{{$href}}"
class="{{$active ? 'bg-primary' : ''}} list-group-item list-group-item-action" >
    {{$slot}}
</a>