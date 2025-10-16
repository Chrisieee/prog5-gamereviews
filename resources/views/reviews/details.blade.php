<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->title}}</h2>
    </x-slot>
    
    <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
        <p>Rating: {{$review->rating}}</p>
        <p>Text: {{$review->text}}</p>
    </div>
</x-app-layout>
