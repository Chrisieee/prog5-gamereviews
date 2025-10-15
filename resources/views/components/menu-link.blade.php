@props(['active'])

<a class="flex-grow p-2 {{$active ? 'bg-review' : 'bg-nav'}} " {{ $attributes }} >{{$slot}}</a>
