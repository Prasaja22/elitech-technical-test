<div class="bg-black flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md relative">
        <!-- Close Button -->
        <a href="{{ route('feed') }}" wire:navigate class="absolute top-2 right-5 text-gray-500 hover:text-gray-700">
            <span class="text-3xl">&times;</span>
        </a>

        <h2 class="text-center mb-6 text-lg text-black">What's inside your mind?</h2>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
                {{ session('message') }}
            </div>
        @endif

        <!-- Caption Input -->
        <div class="mb-4">
            <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
            <textarea wire:model="caption" id="caption" placeholder="Write your caption..."
                class="w-full bg-gray-100 text-black border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-300" rows="3"></textarea>
            @error('caption') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- File Upload (Image or Video or Camera) -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Upload Image/Video</label>
            <input type="file" wire:model="media" accept="image/*,video/*" capture="camera"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:text-gray-700 file:bg-gray-50 hover:file:bg-gray-100">
            @error('media') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Loading Spinner -->
        <div class="w-12 h-12 rounded-full animate-spin border-2 border-solid border-pink-700 border-t-transparent absolute inset-0 top-32 flex items-center justify-center mx-auto" wire:loading wire:target="media">
            <div class="border-t-transparent border-2 border-pink-700 rounded-full w-12 h-12 animate-spin"></div>
        </div>

        <!-- Display Image or Video Preview -->
        @if ($media)
            <div class="mb-4">
                @php
                    $mimeType = $media->getClientMimeType();
                @endphp
                <!-- Debug: Output mime type -->
                <p class="text-xs text-gray-500">{{ $mimeType }}</p>

                @if (Str::startsWith($mimeType, 'video/'))
                    <!-- Preview Video -->
                    <video controls class="w-full max-w-xs mx-auto rounded-lg mt-3">
                        <source src="{{ $media->temporaryUrl() }}" type="{{ $mimeType }}">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <!-- Preview Image -->
                    <img src="{{ $media->temporaryUrl() }}" alt="Preview" class="w-full max-w-xs mx-auto rounded-lg mt-3">
                @endif
            </div>
        @endif

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button wire:click="uploadPost" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
                Post
            </button>
        </div>
    </div>
</div>
