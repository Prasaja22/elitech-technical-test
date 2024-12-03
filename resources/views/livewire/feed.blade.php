@extends('livewire.layout')

@section('section')
    <!-- Feed Container -->
    <div class="flex-grow max-w-lg mx-auto space-y-6">
        @forelse ($posts as $post)
            <!-- Post Card -->
            <div class="bg-black">
                <!-- Post Header -->
                <div class="flex items-center justify-between px-3 py-2">
                    <div class="flex items-center gap-2">
                        <img src="{{ $post->user->profile_photo ? asset('storage/' . $post->user->profile_photo) : asset('images/default-avatar.png') }}"
                             alt="User Avatar"
                             class="w-10 h-10 rounded-full">
                        <div>
                            <a href="{{ route('profile', ['id' => $post->user->id]) }}" wire:navigate class="text-sm text-white font-medium">{{ $post->user->name }}</a>
                            <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Post Media -->
                <div>
                    @php
                        $mediaPath = storage_path('app/public/' . $post->media);
                        $mimeType = mime_content_type($mediaPath);
                    @endphp

                    @if (Str::startsWith($mimeType, 'video/'))
                        <video controls class="w-full h-auto mt-2 rounded-lg">
                            <source src="{{ asset('storage/' . $post->media) }}" type="{{ $mimeType }}">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $post->media) }}" alt="Post Media"
                             class="w-full h-auto mt-2 rounded-lg">
                    @endif
                </div>

                <!-- Post Actions -->
                <div class="py-3 space-y-2 mt-2">
                    <div class="flex items-center justify-between">
                        <div class="flex space-x-4">
                            <button class="text-gray-400 hover:text-red-500">
                                <i class="far fa-heart text-lg"></i>
                            </button>
                            <button class="text-gray-400 hover:text-yellow-500">
                                <i class="far fa-bookmark text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Likes -->
                    <p class="text-sm font-medium text-gray-300">Liked by <span class="font-semibold">alex_dev</span> and <span class="font-semibold">20 others</span></p>

                    <!-- Caption -->
                    <p class="text-sm text-gray-300">
                        <span class="font-semibold">{{ $post->user->name }}</span>
                        {{ $post->caption }}
                    </p>
                </div>
                <hr>
            </div>
        @empty
            <p class="text-gray-400 text-center">No posts available.</p>
        @endforelse
    </div>
@endsection
