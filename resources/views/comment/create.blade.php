<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Comment create</h1>
    </x-slot>

    <x-slot name="section">
        <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mt-4 flex flex-col">
                <x-input-label for="text" :value="__('Text')"/>
                <textarea class="border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm"
                          id="text" name="text" rows="5" cols="5" placeholder="Type your review here">{{ old('text') }}</textarea>
                <x-input-error :messages="$errors->get('text')" class="mt-2"/>
            </div>

            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" id="review_id" name="review_id" value="{{ $id }}">

            <div class="text-center mt-3">
                <x-primary-button class="ms-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </x-slot>
</x-app-layout>
