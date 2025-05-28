<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //
    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackToGoogle()
    {


        $user = Socialite::driver('google')->user();

        $finduser = Customer::where('gauth_id', $user->id)->first();
    // dd($user);
        if($finduser){

                Auth::guard('customer')->login($finduser);

            return redirect('/');

        }
        else{
            $newUser = Customer::create([
                'name' => $user->name,
                'email' => $user->email,
                'gauth_id'=> $user->id,
                'gauth_type'=> 'google',
                'password' => encrypt('admin@123')
            ]);

                Auth::guard('customer')->login($newUser);

            return redirect('/');
        }


    }
}
