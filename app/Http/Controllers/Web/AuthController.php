<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /** 
     * Create a new controller instanceo
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /** 
     * View Login
     * 
     * @return mixed
     */
    public function viewLogin(): mixed
    {
        try {
            return view('web.pages.auth.login');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

    /** 
     * Handle Login
     * 
     * @return mixed
     */
    public function handleLogin(Request $request): mixed
    {
        try {

            $validation = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'min:10', 'max:100', 'exists:users'],
                'password' => ['required', 'string', 'min:1', 'max:20']
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ], $request->get('rememberd'))) {
                return redirect(RouteServiceProvider::HOME);
            }

            return redirect()->back()->withErrors([
                'password' => ['Wrong password']
            ])->withInput($request->only('email', 'rememberd'));
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }
}
