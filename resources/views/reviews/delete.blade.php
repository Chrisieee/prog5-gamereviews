<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->title}}</h2>
    </x-slot>

    <x-slot name="section">
        @if($review->image !== null)
            <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->title }}">
        @else
            <img src="{{ Vite::asset('resources/images/image.jpg') }}" alt="no image">
        @endif
        <p>Rating: {{ $review->rating }}</p>
        <p>Game: {{ $review->game->name }}</p>
        <p>Text: {{ $review->text }}</p>
        <p>From: {{ $review->user->name }}</p>

        @if(Auth::user() && $review->user_id === Auth::user()->id)
                <form action="/reviews/destroy/{{ $review->id }}" method="post">
                    @csrf
                    <div class="text-center mt-3">
                        <x-primary-button class="ms-3">
                            {{ __('Delete this review?') }}
                        </x-primary-button>
                    </div>
                </form>
        @endif
    </x-slot>
</x-app-layout>
