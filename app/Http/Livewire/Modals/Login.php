<?php

namespace App\Http\Livewire\Modals;

use App\Http\Livewire\Modal;
use Livewire\Component;

class Login extends Modal
{
    public $email;
    public $password;
    public $loginPage = true;
    public $registerPage = false;

    private function resetInputFields(){
        $this->email = '';
        $this->password = '';
    }

    public function openLoginPage()
    {
        $this->loginPage = true;
        $this->registerPage = false;
    }

    public function openRegisterPage()
    {
        $this->loginPage = false;
        $this->registerPage = true;
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            session()->flash('message', "You are Login successful.");
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error', 'Email or password are wrong.');
        }
    }

    public function register()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
    }
}
