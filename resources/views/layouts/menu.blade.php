<nav class="flex text-center px-24">
    <div class="flex justify-evenly flex-1 max-w-45">
        <x-menu-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-menu-link>
        <x-menu-link href="{{ route('reviews.index') }}" :active="request()->routeIs('reviews.index')">Reviews
        </x-menu-link>
        <x-menu-link href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About</x-menu-link>
    </div>
    <div class="flex-1"></div>
    <div class="flex justify-evenly flex-1 max-w-40">
        <x-menu-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-menu-link>
        <x-menu-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-menu-link>
    </div>
</nav>
