@extends('livewire.layout')

@section('section')
    <!-- Profile Edit Card -->
    <div class="bg-black rounded-lg p-4">
        <form wire:submit.prevent="save">
            <!-- Profile Header -->
            <div class="flex items-center justify-center">
                <!-- Profile Image -->
                <div class="relative flex flex-col items-center gap-4">
                    <!-- Status Indicator -->
                    <div class="absolute bottom-0 right-0 transform -translate-x-5 -translate-y-6 z-40">
                        <!-- Indikator Online -->
                        <span class="flex h-4 w-4 absolute" wire:offline.class="hidden">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-green-500"></span>
                        </span>

                        <!-- Indikator Offline -->
                        <span class="h-4 w-4 absolute hidden" wire:offline.class.remove="hidden">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-300 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-gray-400"></span>
                        </span>
                    </div>



                    <!-- Gambar Profil -->
                    <label for="photo" class="cursor-pointer relative group">
                        @if ($photo)
                            <!-- Menampilkan pratinjau gambar baru -->
                            <img src="{{ $photo->temporaryUrl() }}" alt="User Avatar"
                                class="w-24 h-24 rounded-full border-4 border-white object-cover">
                        @else
                            <!-- Menampilkan gambar lama -->
                            <img src="{{ asset('storage/'.Auth::user()->profile_photo) }}" alt="User Avatar"
                                class="w-24 h-24 rounded-full border-4 border-white object-cover">
                        @endif
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-camera text-white text-xl"></i>
                        </div>
                    </label>

                    <!-- Input File -->
                    <input type="file" id="photo" wire:model="photo" class="hidden">
                    @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <!-- Loading Indicator -->
                    {{-- <div class="text-white animate-bounce text-center absolute top-10" wire:loading wire:target="photo">
                        Uploading...
                    </div> --}}

                    <div class="w-12 h-12 rounded-full animate-spin
                    border-2 border-solid border-pink-700 border-t-transparent absolute top-6" wire:loading wire:target="photo"></div>
                </div>
            </div>

            <!-- Edit Profile Form -->
            <div class="mt-6 text-white space-y-4  ">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" id="name" wire:model="name"
                           class="w-full bg-black text-white border border-gray-700 rounded-lg px-4 py-2 mt-1 outline-none text-sm" autocomplete="off" spellcheck="false">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium">Status</label>
                    <input type="text" id="status" wire:model="status"
                           class="w-full bg-black text-white border border-gray-700 rounded-lg px-4 py-2 mt-1 outline-none text-sm" autocomplete="off" spellcheck="false">
                    @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium">Bio</label>
                    <textarea id="bio" wire:model="bio" rows="3"
                              class="w-full bg-black text-white border border-gray-700 rounded-lg px-4 py-2 mt-1  outline-none text-sm" autocomplete="off" spellcheck="false"></textarea>
                    @error('bio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-800 hover:bg-blue-900 text-white px-6 py-1 rounded-lg text-sm">Save</button>
            </div>
        </form>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mt-4 text-green-500 text-sm">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
