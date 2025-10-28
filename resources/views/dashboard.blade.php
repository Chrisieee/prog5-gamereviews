<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="section">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Game</th>
                    <th>Text</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($reviews as $review)
                    <tr>
                        <td class="px-2 py-1">{{ $review->title }}</td>
                        <td class="px-2 py-1">{{ $review->rating }}</td>
                        <td class="px-2 py-1">{{ $review->game->name }}</td>
                        <td class="px-2 py-1">{{ $review->text }}</td>
                        <td class="px-2 py-1"><a class="hover:text-nav" href="{{ route('reviews.edit', $review->id) }}">Edit</a></td>
                        <td class="px-2 py-1"><a class="hover:text-nav" href="{{ route('reviews.delete', $review->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
    </x-slot>
</x-app-layout>
