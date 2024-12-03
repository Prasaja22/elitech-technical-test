<div class="min-h-screen bg-black flex flex-col">
    <!-- Header -->
    <header class="bg-black px-2 flex items-center justify-between shadow sticky top-0">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-auto">
    </header>

    <!-- Feed Container -->
    @yield('section')

    <!-- Footer (Sticky at the bottom) -->
    <footer class="w-full bg-black text-white py-3 mt-auto sticky bottom-0 border-t border-white">
        <div class="flex justify-evenly items-center px-4">
            <!-- Home Icon -->
            <a href="{{ route('feed') }}" wire:navigate class="flex flex-col items-center">
                <i class="fas fa-home text-xl"></i>
                <span class="text-xs">Home</span>
            </a>

            <!-- Post Icon (for adding post) -->
            <a href="{{ route('post') }}" wire:navigate class="flex flex-col items-center">
                <i class="fas fa-plus-square text-xl"></i>
                <span class="text-xs">Post</span>
            </a>

            <a href="{{ route('archive') }}" wire:navigate class="flex flex-col items-center">
                <i class="fas fa-archive text-xl"></i>
                <span class="text-xs">Archive</span>
            </a>

            <!-- Profile Icon -->
            <a href="{{ route('profile', ['id' => Auth::id()]) }}" wire:navigate class="flex flex-col items-center">
                <i class="fas fa-user-circle text-xl"></i>
                <span class="text-xs">Profile</span>
            </a>
        </div>
    </footer>
</div>
