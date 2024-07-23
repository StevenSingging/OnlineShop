<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Login')]
class Login extends Component
{
    public $password;
    public $email;

    public function save(){
        $this->validate([
            'email' => 'required|email|exists:users|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if(auth()->attempt(['email' => $this->email, 'password' => $this->password])){
            if(auth()->user()->role=='Admin'){
                return redirect('dashboard-admin');
            }else if(auth()->user()->role=='User'){
                return redirect('dashboard-user');
            }
        }else {
            session()->flash('error', 'Invalid credentials');
            return;
        }

        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
