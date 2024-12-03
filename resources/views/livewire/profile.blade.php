@extends('livewire.layout')

@section('section')
    <!-- Profile Container -->
    <div class="flex-grow max-w-lg mx-auto space-y-6">
        <!-- Profile Card -->
        <div class="bg-black rounded-lg p-4">
            <!-- Profile Header -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <!-- Profile Image -->
                    <img
                    src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/avatar.jpg') }}"
                    alt="User Avatar"
                    class="w-24 h-24 rounded-full border-4 border-white object-cover">
                </div>

                <!-- Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Edit Profile Button -->
                    <a href="{{ route('profile-detail') }}" wire:navigate class="bg-black text-white px-4 py-2 rounded-md text-sm border">Edit Profile</a>

                    <!-- Logout Button -->
                    <button wire:click="logout" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm border"  wire:confirm="Are you sure you want to logout?">
                        Logout
                    </button>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="mt-4 text-white">
                <p class="text-2xl font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-gray-400 text-sm">{{$user->status ? $user->status : 'Set Your Status!'}}</p>
                <div class="flex mt-2 gap-6">
                    <!-- Followers -->
                    <div class="text-center">
                        <p class="text-lg font-semibold">1500</p>
                        <p class="text-sm text-gray-400">Followers</p>
                    </div>
                    <!-- Following -->
                    <div class="text-center">
                        <p class="text-lg font-semibold">300</p>
                        <p class="text-sm text-gray-400">Following</p>
                    </div>
                    <!-- Posts -->
                    <div class="text-center">
                        <p class="text-lg font-semibold">45</p>
                        <p class="text-sm text-gray-400">Posts</p>
                    </div>
                </div>
            </div>

            <!-- Bio Section -->
            <div class="mt-4 text-white">
                <p class="text-sm"><span class="font-semibold">Bio: </span>{{$user->bio ? $user->bio : 'Set Your bio!'}}</p>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="bg-black rounded-lg p-4">
            <p class="text-white text-lg font-semibold">Posts</p>
            <div class="grid grid-cols-3 gap-4 mt-4">
                @forelse ($posts as $post)
                    <div class="relative aspect-square">
                        @if (Str::contains($post->media, ['.mp4', '.webm', '.ogg']))
                            <video controls class="w-full h-full object-cover rounded-lg">
                                <source src="{{ asset('storage/' . $post->media) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('storage/' . $post->media) }}" alt="Post Image"
                                 class="w-full h-full object-cover rounded-lg">
                        @endif
                    </div>
                @empty
                    <p class="text-gray-400 col-span-3 text-center">No posts available.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
