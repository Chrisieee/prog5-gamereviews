<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome admin {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="table">
        <div class="text-center p-2 flex">
            <div class="flex-1 text-left">
                <h2 class="text-xl font-bold">Games overview</h2>
            </div>
            <div class="flex-1"></div>
            <div class="flex-1 text-right">
                <a class="hover:text-nav" href="{{ route('admin.index') }}">Back</a>
            </div>
        </div>

        <table>
            <tr class="text-left font-bold">
                <td class="px-2 py-1">Name</td>
                <td class="px-2 py-1">Release date</td>
                <td class="px-2 py-1">Reviews</td>
            </tr>
            @foreach($games as $game)
                <tr>
                    <td class="px-2 py-1">{{ $game->name }}</td>
                    <td class="px-2 py-1">{{ $game->release_date }}</td>
                    <td class="px-2 py-1">{{ \App\Models\Review::where('game_id', '=', $game->id)->count() }}</td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
