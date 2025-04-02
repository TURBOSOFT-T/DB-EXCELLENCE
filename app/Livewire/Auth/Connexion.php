<?php

namespace App\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class Connexion extends Component
{

    public $email, $password;


    public function connexion()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'string|required',
        ],[
            'email.required' => 'Veuillez entrer votre email',
            'email.email' => 'Veuillez entrer un email valide',
            'email.exists' => 'Cet email n\'existe pas',
            'password.string' => 'Veuillez entrer votre mot de passe',
            'password.required' => 'Veuillez entrer votre mot de passe',
        ]);

        
        $user = User::where('email', $this->email)
            ->first();
        if ($user && Hash::check($this->password, $user->password)) {
            if ($user->role == "user") {
                //flash error message
                session()->flash('error', 'Impossible de se connecté !');
                return;
            } else {
                Auth::login($user);
               
                return redirect()->route('admin');
            }


        } else {
            session()->flash('error', 'Adresse e-mail ou mot de passe incorrect.');
        }
    }
    public function render()
    {


        return view('livewire.auth.connexion');
    }
}
