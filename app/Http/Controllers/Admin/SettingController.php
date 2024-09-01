<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

interface SettingInterface
{
    public function viewSetting();
    public function viewAccountSetting();
    public function handleAccountSetting(Request $request);
    public function viewPasswordSetting();
    public function handlePasswordSetting(Request $request);
}

class SettingController extends Controller implements SettingInterface
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    /**
     * View Setting
     * 
     * @return mixed
     */
    public function viewSetting(): mixed
    {
        try {
            return view('admin.pages.setting.setting');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

       /**
     * View Account Setting
     *
     * @return mixed
     */
    public function viewAccountSetting(): mixed 
    {
        try {
            return view('admin.pages.setting.account-setting');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }    
    }

    /**
     * Handle Account Setting
     *
     * @return RedirectResponse
     */
    public function handleAccountSetting(Request $request): RedirectResponse
    {
        try {
            
            $validation = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:1', 'max:250'],
                'email' => ['required', 'string', 'min:1', 'max:250',Rule::unique('admins')->ignore(auth()->user()->id, 'id')],
                'phone' => ['required', 'numeric', 'digits_between:10,20',Rule::unique('admins')->ignore(auth()->user()->id, 'id')],
                'profile_image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp'],
                'account_password' => ['required', 'string', 'min:1', 'max:100'],
            ]);
    
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            if (Hash::check($request->input('account_password'), auth()->user()->password)) {

                $admin = Admin::find(auth()->user()->id);
                $admin->name = $request->input('name');
                $admin->email = $request->input('email');
                $admin->phone = $request->input('phone');
                $admin->date_of_birth = $request->input('date_of_birth');
                if ($request->hasFile('profile_image')) {
                    if (!is_null(auth()->user()->profile_image)) Storage::delete(auth()->user()->profile_image);
                    $admin->profile_image = $request->file('profile_image')->store('admins');
                }
                $admin->update();
                
                return redirect()->back()->with('message', [
                    'status' => 'success',
                    'title' => 'Changes saved',
                    'description' => 'The changes are successfully saved'
                ]);
            }

            return redirect()->back()->withErrors([
                'account_password' => 'Incorrect password'
            ]);

        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);  
        }
    }

    /**
     * View Password Setting
     *
     * @return mixed
     */
    public function viewPasswordSetting(): mixed 
    {
        try {

            return view('admin.pages.setting.password-setting');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }    
    }

    /**
     * Handle Password Setting
     *
     * @return RedirectResponse
     */
    public function handlePasswordSetting(Request $request): RedirectResponse
    {
        try {
            
            $validation = Validator::make($request->all(), [
                'current_password' => ['required', 'string', 'min:1', 'max:100'],
                'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed'],
            ]);
    
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            if (Hash::check($request->input('current_password'), auth()->user()->password)) {

                $admin = Admin::find(auth()->user()->id);
                $admin->password = Hash::make($request->input('password'));
                $admin->update();
                
                return redirect()->back()->with('message', [
                    'status' => 'success',
                    'title' => 'Password updated',
                    'description' => 'The password is successfully updated'
                ]);
            }

            return redirect()->back()->withErrors([
                'current_password' => 'Current password not matched'
            ]);

        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }
}
