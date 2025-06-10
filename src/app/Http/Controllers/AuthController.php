<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    //
    // public function index()
    //     {
    //     return view('index');
    //     }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('weight_logs.index');
        }

        return back()->withErrors([
            'email' => '認証に失敗しました。メールアドレスまたはパスワードをご確認ください。',
        ])->withInput();
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // メッセージなしでログインページにリダイレクト
    return redirect('/login');
}

}
