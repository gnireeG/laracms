<?php

namespace LaraCms\Core\Http\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';
    
    #[Validate('required')]
    public string $password = '';
    
    public bool $remember = false;

    public function login()
    {
        $this->validate();

        if (!\Auth::attempt([
            'email' => $this->email, 
            'password' => $this->password
        ], $this->remember)) {
            $this->addError('email', 'These credentials do not match our records.');
            return;
        }

        session()->regenerate();

        return redirect()->intended('/admin');
    }

    public function render()
    {
        return view('laracms::components.login-form')->layout('laracms::auth.login');
    }
}