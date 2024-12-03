<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout(); // Logout user
        session()->invalidate(); // Hapus session
        session()->regenerateToken(); // Regenerasi CSRF token untuk mencegah serangan CSRF

        return redirect()->route('login'); // Redirect ke halaman login setelah logout
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
