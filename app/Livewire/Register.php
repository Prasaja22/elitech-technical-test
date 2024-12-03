<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name = '', $fullname = '', $email = '', $password = '';
    public $showPassword = false;

    protected function rules(){
        return [
            'name' => 'required|min:8',
            'fullname' => 'required|min:8',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    protected function messages(){
        return [
            'name.required' => 'Username is required',
            'name.min'=> 'Username is to short must be at least 8 characters',
            'password.required' => 'Password is required',
            'password.min'=> 'Password is to short must be at least 8 characters',
            'fullname.required' => 'Fullname is required',
            'fullname.min' => 'Fullname is to short must be at least 8 characters',
            'email.required' => 'Email is required',
        ];
    }

    public function save(){
        $this->validate();

        User::create([
            'name' => $this->name,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'password' =>Hash::make($this->password),
        ]);

        $this->redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.register');
    }
}
