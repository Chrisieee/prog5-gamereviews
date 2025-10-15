<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->title}}</h2>
    </x-slot>
    <section class="px-basic">
        <p>Rating: {{$review->rating}}</p>
        <p>Text: {{$review->text}}</p>
    </section>
</x-app-layout>
