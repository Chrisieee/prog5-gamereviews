<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Review create</h1>
    </x-slot>

    <x-slot name="section">
        <form action="{{route('reviews.store')}}" method="post">
            @csrf

            <div class="mt-4 flex flex-col">
                <label for="title">Title:</label>
                <input id="title" type="text" name="title">
                <x-input-error :messages="$errors->first('title')"/>
            </div>

            <div class="mt-4 flex flex-col">
                <label for="rating">Rating:</label>
                <input id="rating" type="number" name="rating" min="1" max="5">
                <x-input-error :messages="$errors->first('rating')"/>
            </div>

            <div class="mt-4 flex flex-col">
                <label for="game_id">Game:</label>
                <select name="game_id" id="game_id">
                    @foreach($games as $game)
                        <option value="{{$game->id}}">{{$game->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->first('game_id')"/>
            </div>

            <div class="mt-4 flex flex-col">
                <label for="text">Text:</label>
                <input id="text" type="text" name="text" value="{{ old('text') }}">
                <x-input-error :messages="$errors->first('text')"/>
            </div>

            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

            <input type="submit" name="submit" value="Create">
        </form>
    </x-slot>
</x-app-layout>
