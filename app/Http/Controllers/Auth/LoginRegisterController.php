<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Validation\ValidationException;

class LoginRegisterController extends Controller
{
    //
    public function login()
    {
        session(['url.intended' => url()->previous()]);
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }


    public function store(RegisterFormRequest $request)
    {
        $data = $request->validated();
        $this->create($data);

        // return redirect("/")->withSuccess('Successfully Signed-in!');
        return  redirect("/login")->with('success','You have registered successfully.');
    }

    // public function store(Request $request)
    // {

    //      $validator = Validator::make($request->all(), [
    //          'name' => 'required',
    //          'email' => 'required|email|unique:users,email',
    //          'password' => 'required|confirmed|min:8',
    //      ]);

    //      if ($validator->fails()) {
    //          return Redirect::back()->withErrors($validator);
    //          // throw ValidationException::withMessages(['Email Already Exists!']);
    //      }
    //      else {
    //           // Register the new user or whatever.
    //          $data = $request->all();
    //          $check = $this->create($data);

    //          return redirect("/")->withSuccess('have signed-in');
    //      }
    // }

    public function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     $successMessage = session('success');
    //     if (Auth::guard('customer')->attempt($credentials)) {
    //         // Get the authenticated user

    //         $user = null;
    //         $data = null;

    //         if (Auth::guard('customer')->check()) {
    //             // User authenticated via 'customer' guard
    //             $user = Auth::guard('customer')->user();
    //         }
    //         $previousUrl = session('url.intended');
    //         if ($previousUrl && Str::contains($previousUrl, 'cart')) {
    //             if ($user->profile) {

    //                 session(['url.intended' => url('address')]);
    //                 return redirect()->intended('address');
    //             } else {

    //                 $data = ($user instanceof Customer) ? Customer::find($user->id) : User::find($user->id);
    //                 return view('orders.billingdetails', compact('data'));
    //             }
    //         } else {

    //             $address = ($user instanceof Customer) ? Customer::find($user->id) : User::find($user->id);
    //             return view('auth.profile', compact('address'));
    //         }

    //     }

    //     return redirect()->route('login')->with('error', 'Invalid credentials');
    // }
     public function checkout()
    {
        if (Auth::guard('customer')->check() ) {
            // Get the authenticated user
            $user = Auth::guard('customer')->user();


        if ($user && $user->profile) {
                // If a record exists, redirect to the billing page
                return redirect('/address');
            } else {
                $data = Customer::find($user->id);
                return view('orders.billingdetails', compact('data'));
            }
        }
    }

    public function address()
    {
        if (Auth::guard('customer')->check() ) {
            // Get the authenticated user
            $user = Auth::guard('customer')->user();
            $address = CustomerProfile::with('customer')->where('customer_id', $user->id)->first();
        }

        return view('orders.address', compact('address'));

    }
    public function get_UserProfile(Request $request)
    {


        $request->validate([

            'customer_id' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'door_no' => 'required',
            'street' => 'required',
            'pincode' => 'required|numeric',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            // 'GST' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',


        ]);

        $data = $request->all();
        CustomerProfile::create($data);

        return redirect()->route('profile')->with('success', 'Profile Created Successfully!');

    }
     public function profile(){
        if (Auth::guard('customer')->check()) {
            // Get the authenticated user
            $user = Auth::guard('customer')->user();
            // dd($user->profile);
            if ($user->profile) {
                $address = CustomerProfile::with('customer')->where('customer_id', $user->id)->latest()->first();
                return view('auth.profile', compact('address'));
            } else {
                $data = Customer::find($user->id);
                // dd($address);
                return view('auth.userprofile', compact('data'));
            }
        }

    }
    public function update_userdetails(Request $request){


            $request->validate([

                'customer_id' => 'required',
                'mobile' => 'required|numeric|digits:10',
                'door_no' => 'required',
                'street' => 'required',
                'pincode' => 'required|numeric',
                'area' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                // 'GST' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',


            ]);
            $customer = Auth::guard('customer')->user();
            // dd($customer->id);
            $user = CustomerProfile::findOrNew($customer->id);

            // dd($user);
        // Modify user details
        $user->customer_id = $customer->id;
        $user->mobile = $request->input('mobile');
        $user->door_no = $request->input('door_no');
        $user->street = $request->input('street');
        $user->pincode = $request->input('pincode');
        $user->area = $request->input('area');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->GST = $request->input('GST');
        $user->save();
        // Check if the user exists
        if (!$user) {
            abort(404); // Or handle as appropriate
        }
        return redirect()->back()->with('success', 'Profile Updated Successfully!');

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/login');
    }


}
