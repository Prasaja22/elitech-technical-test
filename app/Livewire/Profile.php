<?php

namespace App\Livewire;

use App\Models\UploadModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $posts;

    public function mount($id)
    {
        // Ambil data user berdasarkan ID
        $this->user = User::findOrFail($id);

        // Ambil postingan terkait user
        $this->posts = UploadModel::where('user_id', $this->user->id)->latest()->get();
    }

        // Fungsi logout
    public function logout()
    {
        Auth::logout(); // Logout user
        session()->invalidate(); // Hapus session
        session()->regenerateToken(); // Regenerasi CSRF token untuk mencegah serangan CSRF

        return redirect()->route('login'); // Redirect ke halaman login setelah logout
    }

    public function render()
    {
        return view('livewire.profile', [
            'user' => $this->user,
            'posts' => $this->posts,
        ]);
    }
}
