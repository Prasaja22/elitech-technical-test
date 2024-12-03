<?php

namespace App\Livewire;

use App\Models\UploadModel;
use Livewire\Component;

class Feed extends Component
{
    public function render()
    {
        // Ambil data dari tabel upload dengan relasi user
        $posts = UploadModel::with('user')->latest()->get();

        return view('livewire.feed', [
            'posts' => $posts,
        ]);
    }
}
