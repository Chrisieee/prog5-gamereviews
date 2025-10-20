<nav class="flex text-center px-basic bg-nav">
    <div class="flex justify-evenly flex-1 max-w-45">
        <x-menu-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-menu-link>
        <x-menu-link href="{{ route('reviews.index') }}" :active="request()->routeIs('reviews.index')">Reviews
        </x-menu-link>
        <x-menu-link href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About</x-menu-link>
    </div>

    <div class="flex-1"></div>

    <div class="flex justify-evenly flex-1 max-w-44">
        @if(Auth::user())
            <form action="{{ route('logout') }}" method="post">@csrf<button class="flex-grow p-3 hover:bg-header " type="submit">Logout</button></form>
            @if(Auth::user()->profile_picture != null)
                <a href="{{ route('dashboard') }}"><img src="{{ Auth::user()->profile_picture }}" alt=""></a>
            @else
                <a class="max-h-12 p-1" href="{{ route('dashboard') }}">
                    <img class="h-full rounded-full border-2 border-background" src="{{ Vite::asset('resources/images/profile.jpg') }}" alt=""></a>
            @endif
        @else
            <x-menu-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-menu-link>
            <x-menu-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-menu-link>
        @endif
    </div>
</nav>
