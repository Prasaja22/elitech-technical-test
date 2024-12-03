<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileDetail extends Component
{
    use WithFileUploads;

    public $photo;
    public $name;
    public $status;
    public $bio;

    public function mount()
    {
        $user = Auth::user();

        // Jika ada user yang login, set nilai default dari data user
        $this->name = $user->name;
        $this->status = $user->status;
        $this->bio = $user->bio;
        // $this->photo = $user->profile_photo;
    }

    public function save()
    {
        $this->validate([
            'photo' => 'nullable|image|max:2048', // Maksimal 2MB
            'name' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Jika ada foto baru yang diunggah
        if ($this->photo) {
            // Hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru
            $urlphoto = $this->photo->store('photos', 'public');
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $urlphoto = $user->profile_photo;
        }

        // Update data user
        $user->update([
            'name' => $this->name,
            'status' => $this->status,
            'bio' => $this->bio,
            'profile_photo' => $urlphoto,
        ]);

        session()->flash('success', 'Profile updated successfully!');
    }
    public function render()
    {
        return view('livewire.profile-detail');
    }
}
