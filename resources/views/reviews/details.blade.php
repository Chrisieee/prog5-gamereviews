<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">{{$review->title}}</h2>
    </x-slot>
    <div class="p-2">
        <p>Rating: {{$review->rating}}</p>
        <p>Text: {{$review->text}}</p>
    </div>
</x-app-layout>
