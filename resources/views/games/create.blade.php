<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Game create</h1>
    </x-slot>

    <x-slot name="section">
        <form action="{{ route('game.store') }}" method="post">
            @csrf

            <div class="mt-4 flex flex-col">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
                <x-input-error :messages="$errors->get('Name')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="release_date" :value="__('Release date')"/>
                <x-text-input id="release_date" class="block mt-1 w-full" type="date" name="release_date" :value="old('release_date')"/>
                <x-input-error :messages="$errors->get('release_date')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="genre_id[]" :value="__('Genres')"/>
                <select multiple class="border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"
                        name="genre_id[]" id="genre_id[]">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('genre_id[]')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                <x-input-label for="description" :value="__('Description')"/>
                <textarea class="border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"
                          id="description" name="description" rows="5" cols="5" placeholder="Type the description here">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="text-center mt-3">
                <x-primary-button class="ms-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </x-slot>
</x-app-layout>
