<div class="bg-black flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-4xl relative">
        <h2 class="text-center mb-6 text-lg text-black">Archive Posts</h2>
        <a href="{{ route('feed') }}" wire:navigate class="absolute top-2 right-5 text-gray-500 hover:text-gray-700">
            <span class="text-3xl">&times;</span>
        </a>

        {{-- Filter --}}
        <div class="mb-4">
            <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" wire:model="startDate" id="startDate" class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2">
        </div>

        <div class="mb-4">
            <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" wire:model="endDate" id="endDate" class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2">
        </div>

        {{-- Table --}}
        <table class="min-w-full table-auto text-sm text-gray-800">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Caption</th>
                    <th class="px-4 py-2 text-left">Media</th>
                    <th class="px-4 py-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-4 py-2">{{ $post->caption }}</td>
                        <td class="px-4 py-2">
                            @if (Str::startsWith(mime_content_type(storage_path('app/public/' . $post->media)), 'video/'))
                                <video class="w-20 h-20 object-cover" controls>
                                    <source src="{{ asset('storage/' . $post->media) }}">
                                </video>
                            @else
                                <img src="{{ asset('storage/' . $post->media) }}" class="w-20 h-20 object-cover" alt="Media">
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $posts->links() }}
        </div>

        {{-- Export Buttons --}}
        <div class="flex justify-between mt-6">
            <button wire:click="exportExcel" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Export Excel</button>
            <button wire:click="exportPdf" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Export PDF</button>
        </div>
    </div>
</div>
