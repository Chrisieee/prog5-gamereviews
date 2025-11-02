<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="section">
        <div class="text-right my-2">
            <a href="{{ route('profile.edit') }}" class="items-center px-4 py-2 bg-reviewborder border-4 border-reviewborder rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-review hover:border-reviewborder hover:border-4 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Profile edit</a>
        </div>
        <h3 class="text-xl font-bold text-center pb-2">Reviews:</h3>
            <table class="text-left">
                <tr>
                    <th class="px-2">Title</th>
                    <th class="px-2">Rating</th>
                    <th class="px-2">Game</th>
                    <th class="px-2">Text</th>
                    <th class="px-2"></th>
                    <th class="px-2"></th>
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
