{{--reviews index--}}
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Reviews</h1>
    </x-slot>
    {{--@dump($reviews)--}}

    <section class="grid grid-cols-3 gap-5">
        @foreach($reviews as $review)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center">Title: {{$review->title}}</h2>
                <p>Form: {{ $review->user->name }}</p>
                <p>Rating: {{ $review->rating }}</p>
                <p>Game: {{ $review->game->name }}</p>
                <p>Text: {{ $review->text }}</p>
                <a class="hover:text-nav" href="/reviews/{{ $review->id }}">Details</a>
            </div>
        @endforeach
    </section>

    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
       href="{{ route('reviews.create') }}">Add</a>

</x-app-layout>
