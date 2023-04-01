<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function googleRedirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request)
    {
        try {
            $userData = Socialite::driver('google')->user();
            // Check Login
            $user = User::where('email', $userData->email)->first();

            if ($user) {
                Auth::login($user);

                return redirect('');
            } else {
                $newUser = User::create([
                    'name' => $userData->name,
                    'email' => $userData->email,
                    'social_id'=> $userData->id,
                    'level' => Constant::user_level_client,
                ]);
     
                Auth::login($newUser);
      
                return redirect('');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
