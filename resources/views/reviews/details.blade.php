<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->title}}</h2>
    </x-slot>

    <x-slot name="section">
        <div class="flex flex-col justify-between">
            <div class="flex text-center justify-center m-1">
                @for($i = 0; $i < $review->rating; $i++ )
                    <p class="text-5xl mb-2">⭐</p>
                @endfor
            </div>
            <div class="flex justify-center">
                @if($review->image !== null)
                    <img class="max-h-64 object-contain" src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->title }}">
                @else
                    <img class="max-h-64 object-contain" src="{{ Vite::asset('resources/images/image.jpg') }}" alt="no image">
                @endif
            </div>
            <div>
                <p class="font-bold">{{ $review->game->name }}</p>
                <p>{{ $review->text }}</p>
            </div>
            <div>
                <p>From: {{ $review->user->name }}</p>
                @can('edit-review', $review)
                    <a class="hover:text-nav" href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                @endcan
            </div>
            <div>
                @auth
                    <a class="hover:text-nav" href="{{ route('comment.create', $review->id) }}">Post a comment</a>
                @endauth
                @foreach($review->comments as $comment)
                    <p>{{ $comment->user->name }}: {{ $comment->text }}</p>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
