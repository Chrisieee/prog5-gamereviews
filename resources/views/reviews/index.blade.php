{{--reviews index--}}
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Reviews</h1>
    </x-slot>
    {{--@dump($reviews)--}}
    <div class="w-full text-center">
        <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
           href="{{ route('reviews.create') }}">Add</a>
    </div>

    <section class="grid grid-cols-3 gap-5 mt-4">
        @foreach($reviews as $review)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center font-bold">Title: {{$review->title}}</h2>
                <p>Rating: {{ $review->rating }}</p>
                @if($review->image !== null)
                    <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->title }}">
                @else
                    <img src="{{ Vite::asset('resources/images/image.jpg') }}" alt="no image">
                @endif
                <p>Game: {{ $review->game->name }}</p>
                <p>Text: {{ $review->text }}</p>
                <p>From: {{ $review->user->name }}</p>
                <a class="hover:text-nav" href="/reviews/{{ $review->id }}">Details</a>
            </div>
        @endforeach
    </section>

</x-app-layout>
