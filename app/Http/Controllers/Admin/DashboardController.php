<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;

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
        $this->middleware(['auth:admin'])->except('logout');
    }

    /**
     * View Dashboard
     *
     * @return mixed
     */
    public function viewDashboard(): mixed
    {
        try {            
            return view('admin.pages.dashboard.dashboard');
        } catch (Exception $exception) {
            return redirect()->back()->with('message', [
                'status' => 'error',
                'title' => 'An error occcured',
                'description' => $exception->getMessage()
            ]);
        }
    }   

    /**
     * Handle Logout
     *
     * @return mixed
     */
    public function handleLogout(): mixed
    {
        try {
            Auth::logout();
            return redirect()->route('admin.view.login');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }
}
