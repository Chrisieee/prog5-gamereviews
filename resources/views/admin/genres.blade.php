<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome admin {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="table">
        <div class="text-center p-2 flex">
            <div class="flex-1 text-left">
                <h2 class="text-xl font-bold">Genres overview</h2>
            </div>
            <div class="flex-1"></div>
            <div class="flex-1 text-right">
                <a class="hover:text-nav" href="{{ route('admin.index') }}">Back</a>
            </div>
        </div>

        <table>
            <tr class="text-left font-bold">
                <td class="px-2 py-1">Name</td>
                <td class="px-2 py-1">Status</td>
                <td class="px-2 py-1">Games</td>
            </tr>
            @foreach($genres as $genre)
                <tr>
                    <td class="px-2 py-1">{{ $genre->name }}</td>
                    @if($genre->active === 0)
                        <td class="px-2 py-1"><a class="text-red hover:text-nav" href="{{ route('admin.genre.toggle', $genre->id) }}">Publish</a></td>
                    @else
                        <td class="px-2 py-1"><a class="text-green hover:text-nav" href="{{ route('admin.genre.toggle', $genre->id) }}">Unpublish</a></td>
                    @endif
                    <td class="px-2 py-1">{{ \App\Models\Game::whereRelation('genres', 'genre_id', $genre->id)->count() }}</td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
