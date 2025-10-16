<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->title}}</h2>
    </x-slot>

    <x-slot name="section">
        <p>From: {{ $review->user->name }}</p>
        <p>Rating: {{ $review->rating }}</p>
        <p>Game: {{ $review->game->name }}</p>
        <p>Text: {{ $review->text }}</p>
    </x-slot>
</x-app-layout>
