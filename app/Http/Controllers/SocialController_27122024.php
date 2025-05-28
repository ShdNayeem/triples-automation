<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;
use Socialite;
use Exception;
use Auth;

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
      
            }else{
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
