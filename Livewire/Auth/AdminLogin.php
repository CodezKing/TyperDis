<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;




class AdminLogin extends Component
{
    public $email, $password;

    public function login()
    {
        $this->validate([
            'email'=>'required│email',
            'password' => 'required',
        ]);
    
    // make HTTP request to backend APi

    $response = Http::post('/api/login',[
        'email' => $this->email,
        'password' => $this->password,
        'admin_type' => 'admin',
    ]);

    if($response->successful()) {
        //Handle successful login
        session(['asmin_token' => $response->json()['token']]);
        session()->flash('message','Admin login successful');
        return redirect()->route('admin.dashboard');
    } else {
        // Handle failed login attempt
        session()->flash('error','Invalid login credentials');
    }
    }

    public function render()
    {
        return view('livewire.admin-login');
    }
}