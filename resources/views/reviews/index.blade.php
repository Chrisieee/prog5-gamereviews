{{--reviews index--}}
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Reviews</h1>
    </x-slot>

    <div class="w-full text-center">
        <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
           href="{{ route('reviews.create') }}">Add</a>
    </div>

{{--    <form class="flex" action="" method="post">--}}
{{--        @csrf--}}
{{--        <div>--}}
{{--            <x-input-label for="genre_id[]" :value="__('Genres')"/>--}}
{{--            <select class="border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"--}}
{{--                    name="genre_id[]" id="genre_id[]">--}}
{{--                @foreach($genres as $genre)--}}
{{--                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <x-input-error :messages="$errors->get('genre_id[]')" class="mt-2"/>--}}
{{--        </div>--}}

{{--        <div class="text-center mt-3">--}}
{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Search') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}

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
                <a class="hover:text-nav" href="{{ route('reviews.details', $review->id) }}">Details</a>
            </div>
        @endforeach
    </section>

</x-app-layout>
