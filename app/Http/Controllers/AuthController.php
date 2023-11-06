<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\User\UserRequest;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withDanger('Oppes! You have entered invalid email or password');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.registration');
    }

    public function postRegistration(UserRequest $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect("login")->withSuccess('Good! You have Successfully Registered');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function list()
    {
        $data = [
            'users' => User::get()
        ];
        // dd($data)
        return view('user.index', $data);
    }

    public function update()
    {
        return view('user.preview');
    }
}
