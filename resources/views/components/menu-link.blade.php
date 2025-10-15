@props(['active'])

<a class="flex-grow p-2 bg-red-500 @if($active) bg-gray-300  @endif " {{ $attributes }} >{{$slot}}</a>
