<div class="bg-black flex flex-col items-center justify-center min-h-screen">
    <!-- Login Box -->
    <div class="bg-black border border-gray-300 p-6 shadow-sm w-full max-w-xs mt-10">
        <!-- Logo -->
        <div class="flex justify-center">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Instagram Logo" class="w-52">
        </div>

        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-4">
            <div>
                <input type="text" wire:model="name" placeholder="Username"
                       class="w-full text-sm px-4 py-1 border bg-black text-white border-gray-300 rounded outline-none">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <div class="relative">
                    <!-- Input Field -->
                    <input type="{{ $showPassword ? 'text' : 'password' }}"
                           wire:model="password"
                           placeholder="Password"
                           class="w-full text-sm px-4 py-1 border bg-black text-white border-gray-300 rounded outline-none">

                    <!-- Button untuk Toggle Show/Hide Password -->
                    <button type="button"
                            wire:click="$toggle('showPassword')"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white focus:outline-none">
                        @if($showPassword)
                            <!-- Ikon Mata Terbuka -->
                            <i class="fas fa-eye"></i>
                        @else
                            <!-- Ikon Mata Tertutup -->
                            <i class="fas fa-eye-slash"></i>
                        @endif
                    </button>
                </div>
                <!-- Error Message -->
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                    class="w-full text-sm bg-blue-800 text-white py-1 rounded hover:bg-blue-600 transition">
                Log In
            </button>
        </form>
    </div>

    <!-- Register Section -->
    <div class="bg-black border border-gray-300 p-6 shadow-sm w-full max-w-xs mt-2 mb-4">
        <div class="flex items-center justify-center">
            <div class="border-t border-gray-300 w-full"></div>
            <span class="px-2 text-gray-500 text-sm">OR</span>
            <div class="border-t border-gray-300 w-full"></div>
        </div>
        <div class="text-center">
            <p class="text-sm text-gray-200">Don't have an account?
                <a href="{{ route('register') }}" wire:navigate class="text-blue-500 font-medium hover:underline">Sign up</a>
            </p>
        </div>
    </div>
</div>
