<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $validData = User::where('email',$request->email)->first();
        $password_check = password_verify($request->password,@$validData->password);
        if($password_check == false) {
            return back()->with('message',"Email Or Password Does Not Match");
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('login');
        }
    }
}
