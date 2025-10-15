<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">Reviews</h2>
    </x-slot>
    @dump($reviews)

    {{--    @dump($review->title)--}}
    {{--    @dump($review->text)--}}
    {{--    @foreach($review->attributesToArray() as $info)--}}
    {{--        <p>{{$info}}</p>--}}
    {{--    @endforeach--}}

    @foreach($reviews as $review)
        <div class="p-2">
            <p>Title: {{$review->title}}</p>
            <p>Rating: {{$review->rating}}</p>
            <p>Text: {{$review->text}}</p>
            <a href="/reviews/{{$review->id}}">Details</a>
        </div>
    @endforeach

</x-app-layout>
