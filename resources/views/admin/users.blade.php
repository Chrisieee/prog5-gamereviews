<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Welcome {{ Auth::user()->name }}</h2>
    </x-slot>

    <x-slot name="table">
        <div class="text-center p-2 flex">
            <div class="flex-1 text-left">
                <h2 class="text-xl font-bold">Users overview</h2>
            </div>
            <div class="flex-1"></div>
            <div class="flex-1 text-right">
                <a class="hover:text-nav" href="{{ route('admin.index') }}">Back</a>
            </div>
        </div>

        <table>
            <tr class="text-left font-bold">
                <td class="px-2 py-1">Name</td>
                <td class="px-2 py-1">Email</td>
                <td class="px-2 py-1"></td>
                <td class="px-2 py-1"></td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td class="px-2 py-1">{{ $user->name }}</td>
                    <td class="px-2 py-1">{{ $user->email }}</td>
{{--                    <td class="px-2 py-1"><a class="hover:text-nav" href="{{ route('users.edit', $user->id) }}">Edit</a></td>--}}
{{--                    <td class="px-2 py-1"><a class="hover:text-nav" href="{{ route('users.delete', $user->id) }}">Delete</a></td>--}}
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
