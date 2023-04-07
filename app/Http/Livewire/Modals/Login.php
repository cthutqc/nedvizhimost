<?php

namespace App\Http\Livewire\Modals;

use App\Http\Livewire\Modal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Login extends Modal
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            session()->flash('message', "Вы удачно вошли.");
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error', 'Email или пароль не совпадают.');
        }
    }

    public function register()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $user->assignRole('user');

        Auth::login($user);

        return redirect(request()->header('Referer'));
    }
}
