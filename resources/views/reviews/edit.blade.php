<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Review edit</h1>
    </x-slot>

    <x-slot name="section">
        <form action="{{ route('reviews.update', $review->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mt-4 flex flex-col">
                <x-input-label for="title" :value="__('Title')"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$review->title"/>
                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="rating" :value="__('Rating')"/>
                <x-text-input id="rating" class="block mt-1 w-full" type="number" name="rating" min="1" max="5" :value="$review->rating"/>
                <x-input-error :messages="$errors->get('rating')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="image" :value="__('Image')"/>
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="$review->image"/>
                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="game_id" :value="__('Game')"/>
                <select class="border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"
                        name="game_id" id="game_id">
                    @foreach($games as $game)
                        <option @if($game->id === $review->game->id) selected @endif
                                value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('game_id')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="text" :value="__('Text')"/>
                <textarea class="border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"
                          id="text" name="text" rows="5" cols="5" placeholder="Type your review here">{{ $review->text }}</textarea>
                <x-input-error :messages="$errors->get('text')" class="mt-2"/>
            </div>

            <input type="hidden" id="user_id" name="user_id" value="{{ $review->user_id }}">

            <div class="text-center mt-3">
                <x-primary-button class="ms-3">
                    {{ __('Edit') }}
                </x-primary-button>
            </div>
        </form>
    </x-slot>
</x-app-layout>
