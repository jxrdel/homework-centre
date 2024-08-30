<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Container;
use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;

    public function render()
    {
        return view('livewire.login-form');
    }

    public function login(){

        $user = User::find(1); //Gets user
        Auth::login($user);
        redirect()->route('/');

        // $whitelist = ['jardel.regis', 'kia.boldan', 'kizzy.villaroel', 'varma.maharaj'];

        // try{

        //     $connection = Container::getConnection('default');
        //     $user = User::where('Username', $this->username)->first(); //Gets user

        //     if ($user){ //If user is found..
        //         $ADuser = $connection->query()->where('samaccountname', '=', $this->username)->first(); //Gets user from AD
        //         // dd($ADuser);
        //         if($ADuser){
        //             if ($connection->auth()->attempt($ADuser['distinguishedname'][0], $this->password)){ //Authenticate User
        //                 // dd('Success');
        //                 Auth::login($user);
        //                 redirect()->route('/');
        //             }else {
        //                 // dd('Error');
        //                 $this->resetValidation();
        //                 $this->addError('password', 'Incorrect password');
        //                 $this->password = null;
        //             }
        //         }else{
        //             $this->resetValidation();
        //             $this->addError('username', 'User does not have a Windows Login. Please contact Administrator');
        //         }
        //     }
        //     else{ //Display error if no user is found
        //         $this->resetValidation();
        //         $this->addError('username', 'User not found');
        //     }
        // }catch(Exception $e){
        //     dd('Error: Please contact IT at ext 11124', $e->getMessage());
        // }


    }
}
