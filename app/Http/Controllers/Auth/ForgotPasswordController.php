<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{

    public function showForgetPasswordForm()
    {
        return view("auth.forgetPassword");
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:customer",
        ]);

        $token = Str::random(64);

        DB::table("password_reset_tokens")->insert([
            "email" => $request->email,

            "token" => $token,

            "created_at" => Carbon::now(),
        ]);

        Mail::send("email.forgetPassword", ["token" => $token], function (
            $message
        ) use ($request) {
            $message->to($request->email);

            $message->subject("Reset Password");
        });

        return back()->with(
            "message",
            "We have e-mailed your password reset link!"
        );
    }


    public function showResetPasswordForm($token)
    {
        return view("auth.forgetPasswordLink", ["token" => $token]);
    }


    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:customer",

            "password" => "required|string|min:6|confirmed",

            "password_confirmation" => "required",
        ]);

        $updatePassword = DB::table("password_reset_tokens")

            ->where([
                "email" => $request->email,

                "token" => $request->token,
            ])

            ->first();

        if (!$updatePassword) {
            return back()
                ->withInput()
                ->with("error", "Invalid token!");
        }

        $Customer = Customer::where("email", $request->email)
        ->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")
            ->where(["email" => $request->email])
            ->delete();

        return redirect("/login")->with(
            "message",
            "Your password has been changed!"
        );
    }
}
