<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFeilds = $request->validate([
            'name' => ['required', 'string', "min:2", Rule::unique('users', 'name')],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $incomingFeilds['password'] = bcrypt($incomingFeilds['password']);
        $user = User::create($incomingFeilds);
        auth()->login($user);

        return redirect('/');
    }   

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
};
