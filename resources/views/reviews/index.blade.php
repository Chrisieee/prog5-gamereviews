{{--reviews index--}}
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Reviews</h1>
    </x-slot>

    <div class="flex justify-evenly">
        <form class="flex gap-3" action="" method="get">
            <div>           {{--genresfilter--}}
                <select multiple class="h-12 border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"
                        name="genre[]" id="genre">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>           {{--zoekinput--}}
                <x-text-input id="name" class="block w-full" type="text" name="name" placeholder="Search" :value="old('name')"/>
            </div>

            <div class="text-center">
                <x-primary-button class=" px-4 py-3">
                    {{ __('Search') }}
                </x-primary-button>
            </div>
        </form>

        <div class="flex-1"></div>

        @if(Auth::user()->can('review-make'))
            <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('reviews.create') }}">New review</a>
        @endif
    </div>


    <section class="grid grid-cols-3 gap-5 mt-4">
        @foreach($reviews as $review)
            <div class="flex flex-col justify-between flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <div>
                    <h2 class="text-lg text-center font-bold">{{$review->title}}</h2>
                    <div class="text-center m-1">
                        @for($i = 0; $i < $review->rating; $i++ )
                            <i>⭐</i>
                        @endfor
                    </div>
                    @if($review->image !== null)
                        <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->title }}">
                    @else
                        <img class="max-h-28 w-full object-cover" src="{{ Vite::asset('resources/images/image.jpg') }}" alt="no image">
                    @endif
                </div>
                <div class="flex-1">
                    <p class="font-bold">{{ $review->game->name }}</p>
                    <p>{{ $review->text }}</p>
                </div>
                <p>From: {{ $review->user->name }}</p>
                <div class="text-center">
                    <a class="hover:text-nav" href="{{ route('reviews.details', $review->id) }}">Details</a>
                </div>
            </div>
        @endforeach
    </section>

</x-app-layout>
