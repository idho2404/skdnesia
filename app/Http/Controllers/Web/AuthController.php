<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function loginPage()
    {
        return view('pages.auth.auth'); // ✅ Sudah benar
    }

    /**
     * Show register page
     */
    public function registerPage()
    {
        return view('pages.auth.auth'); // ✅ Sudah benar
    }

    /**
     * Process login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah'])
                ->withInput($request->only('email'));
        }

        // Check if user is active
        if (!Auth::user()->is_active) {
            Auth::logout();
            return back()
                ->withErrors(['email' => 'Akun Anda tidak aktif'])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard') // ✅ Ubah ke route('dashboard')
            ->with('success', 'Selamat datang, ' . Auth::user()->name);
    }

    /**
     * Process registration
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_active' => true,
            ]);

            // Assign default role if needed
            // $user->assignRole('user');

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('dashboard')
                ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name);
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan saat registrasi'])
                ->withInput($request->only('name', 'email'));
        }
    }

    /**
     * Show dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('pages.dashboard.index', compact('user')); // ✅ Sudah benar
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah berhasil logout');
    }
}
