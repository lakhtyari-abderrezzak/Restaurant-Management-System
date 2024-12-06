<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the login form data
        $fields = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

    //     // Attempt to login the user with provided credentials
    if(Auth::attempt($fields,$request->remember)){
        $user = Auth::user();
        
        // Redirect based on user role
        return redirect('/');
       }else{
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
       };
 
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
