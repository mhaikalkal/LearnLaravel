<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // pake ini
use Illuminate\Support\Facades\Auth; // ini yang buat attempt

use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login', [
            'title' => 'login',
            'active' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
        // redirect('/login')->with($request->session()->flash())
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register() {
        return view('auth.register', [
            'title' => 'register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request) {
        // validasi data dulu, kalau salah gaakan lolos.
        $validatedData = $request->validate([
           'name' => 'required|max:255',
           'username' => ['required', 'min:6', 'max:12', 'unique:users'],
           'email' => ['required', 'email:dns', 'unique:users'],
           'password' => ['required', 'min:5', 'max:12']
        ]);

        // 2 cara dibawah sama aja, tapi kalo yg pake Hash::make harus import/ use
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        // kalau bener data inputannya baru kita create
        User::create($validatedData);

        // alert bahwa regist sukses,
        // $request->session()->flash('success', 'Registration Successfull!');
        return redirect('/login')->with($request->session()->flash('success', 'Registration Successfull!'));
    }
}
