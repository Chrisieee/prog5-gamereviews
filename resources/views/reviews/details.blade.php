<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->title}}</h2>
    </x-slot>

    <x-slot name="section">
        <p>Rating: {{$review->rating}}</p>
        <p>Text: {{$review->text}}</p>
    </x-slot>
</x-app-layout>
