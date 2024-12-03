<?php

namespace App\Livewire;

use App\Models\UploadModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Uploads extends Component
{
    use WithFileUploads;

    public $caption;
    public $media;
    public $imagePreview;

    protected function rules()
    {
        return [
            'media' => 'nullable|mimes:jpg,jpeg,png,mp4,mov|max:153600', // 150 MB = 153600 KB
            'caption' => 'required|string|max:255',
        ];
    }

    protected function messages()
    {
        return [
            'media.mimes' => 'The file must be a JPG, JPEG, PNG, MP4, or MOV.',
            'media.max' => 'The file size must not exceed 150 MB.',
            'caption.required' => 'Caption is required.',
        ];
    }


    public function uploadPost()
    {
        $this->validate();

        $path = null; // Default path jika tidak ada media

        // Jika ada file yang diunggah
        if ($this->media) {
            $path = $this->media->store('uploads', 'public');
        }

        // Simpan data ke database
        UploadModel::create([
            'caption' => $this->caption,
            'media' => $path, // Media bisa null
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('message', 'Post uploaded successfully!');

        // Reset form setelah upload
        $this->reset('caption', 'media', 'imagePreview');
    }


    public function render()
    {
        return view('livewire.uploads');
    }
}
