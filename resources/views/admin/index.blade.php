<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="section">
        <div class="text-center p-2 flex">
            <div class="flex-1 text-left">
                <h2 class="text-xl font-bold">Admin Dashboard</h2>
            </div>
        </div>

        <div class="w-full text-center flex gap-2">
            <a class="flex-1 border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.reviews') }}">Reviews</a>
            <a class="flex-1 border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.games') }}">Games</a>
            <a class="flex-1 border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.genres') }}">Genres</a>
            <a class="flex-1 border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.users') }}">Users</a>
        </div>
    </x-slot>
</x-app-layout>
