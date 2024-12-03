<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $name = '', $password = '';
    public $showPassword = false;

    protected function rules(){
        return [
            'name' => 'required|min:8',
            'password' => 'required|min:8',
        ];
    }

    protected function messages(){
        return [
            'name.required' => 'Username is required',
            'name.min'=> 'Username is to short must be at least 8 characters',
            'password.required' => 'Password is required',
            'password.min'=> 'Password is to short must be at least 8 characters',
        ];
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['name' => $this->name, 'password' => $this->password])) {
            session()->flash('message', 'Login successful!');
            return redirect()->route('feed');
        } else {
            session()->flash('error', 'Invalid credentials');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
