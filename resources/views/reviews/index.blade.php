{{--reviews index--}}
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Reviews</h1>
    </x-slot>
    {{--@dump($reviews)--}}

    <section class="grid grid-cols-3 gap-5">
        @foreach($reviews as $review)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center">Title: {{$review->title}}</h2>
                <p>Rating: {{$review->rating}}</p>
                <p>Text: {{$review->text}}</p>
                <a href="/reviews/{{$review->id}}">Details</a>
            </div>
        @endforeach
    </section>
</x-app-layout>
