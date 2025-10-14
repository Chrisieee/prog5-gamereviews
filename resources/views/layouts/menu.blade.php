<nav class="flex text-center">
    <div class="flex justify-evenly flex-1">
        <x-menu-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-menu-link>
        <x-menu-link href="{{ route('home') }}" :active="request()->routeIs('reviews')">Reviews</x-menu-link>
        <x-menu-link href="{{ route('home') }}" :active="request()->routeIs('about')">About</x-menu-link>
    </div>
    <div class="flex-1"></div>
    <div class="flex flex-1">
        <x-menu-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-menu-link>
        <x-menu-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-menu-link>
    </div>
</nav>
