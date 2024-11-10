<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'Email maydoni to\'ldirilishi shart.',
            'email.email' => 'Iltimos, haqiqiy email manzilini kiriting.',
            'password.required' => 'Parol maydoni to\'ldirilishi shart.',
            'password.min' => 'Parol kamida 6 ta belgidan iborat bo\'lishi kerak.',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('admin.index');
        } else {
            return back()->withErrors([
                'email' => 'Email yoki parol noto\'g\'ri.',
            ]);
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ], [
            'name.required' => 'Ism maydoni to\'ldirilishi shart.',
            'name.min' => 'Ism kamida 3 ta belgidan iborat bo\'lishi kerak.',
            'name.max' => 'Ism maksimal 50 ta belgidan iborat bo\'lishi kerak.',
            'name.regex' => 'Ism faqat harflar va bo\'sh joylardan iborat bo\'lishi kerak.',
            'email.required' => 'Email maydoni to\'ldirilishi shart.',
            'email.email' => 'Iltimos, haqiqiy email manzilini kiriting.',
            'email.unique' => 'Bu email allaqachon ro\'yxatdan o\'tgan.',
            'password.required' => 'Parol maydoni to\'ldirilishi shart.',
            'password.min' => 'Parol kamida 6 ta belgidan iborat bo\'lishi kerak.',
            'password.confirmed' => 'Parolni tasdiqlash maydoni mos kelmadi.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('admin.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
