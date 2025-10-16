@props(['active'])

<a class="flex-grow p-3 {{$active ? 'bg-header' : 'bg-nav'}} hover:bg-header " {{ $attributes }} >{{$slot}}</a>
