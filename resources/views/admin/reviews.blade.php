<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome admin {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="table">
        <div class="text-center p-2 flex">
            <div class="flex-1 text-left">
                <h2 class="text-xl font-bold">Reviews overview</h2>
            </div>
            <div class="flex-1"></div>
            <div class="flex-1 text-right">
                <a class="hover:text-nav" href="{{ route('admin.index') }}">Back</a>
            </div>
        </div>

        <table>
            <tr class="text-left font-bold">
                <td class="px-2 py-1">Id</td>
                <td class="px-2 py-1">Title</td>
                <td class="px-2 py-1">Game</td>
                <td class="px-2 py-1">User</td>
                <td class="px-2 py-1">Status</td>
            </tr>
            @foreach($reviews as $review)
                <tr>
                    <td class="px-2 py-1">{{ $review->id }}</td>
                    <td class="px-2 py-1">{{ $review->title }}</td>
                    <td class="px-2 py-1">{{ $review->game->name }}</td>
                    <td class="px-2 py-1">{{ $review->user->name }}</td>
                    @if($review->active === 0)
                        <td class="px-2 py-1"><a class="text-red hover:text-nav" href="{{ route('admin.review.toggle', $review->id) }}">Publish</a></td>
                    @else
                        <td class="px-2 py-1"><a class="text-green hover:text-nav" href="{{ route('admin.review.toggle', $review->id) }}">Unpublish</a></td>
                    @endif
                    <td class="px-2 py-1"><a class="hover:text-nav" href="{{ route('reviews.edit', $review->id) }}">Edit</a></td>
                    <td class="px-2 py-1"><a class="hover:text-nav" href="{{ route('reviews.delete', $review->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
