<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

interface DashboardInterface
{
    public function viewDashboard();
}

class DashboardController extends Controller implements DashboardInterface
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * View Dashboard
     *
     * @return mixed
     */
    public function viewDashboard(): mixed
    {
        try {
            return view('web.pages.dashboard.dashboard');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

    public function handleLogout(): mixed
    {
        try {
            Auth::logout();
            return redirect()->route('web.view.login');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }
}
