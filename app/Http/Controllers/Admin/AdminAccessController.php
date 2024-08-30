<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminRole;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

interface AdminAccessInterface
{
    public function viewAdminAccessList();
    public function viewAdminAccessCreate();
    public function viewAdminAccessUpdate($id);
    public function handleAdminAccessCreate(Request $request);
    public function handleAdminAccessUpdate(Request $request, $id);
    public function handleToggleAdminAccessStatus(Request $request);
    public function handleAdminAccessDelete($id);
}

class AdminAccessController extends Controller implements AdminAccessInterface
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
     * View Admin Access List
     *
     * @return mixed
     */
    public function viewAdminAccessList(): mixed
    {
        try {

            $admins = Admin::whereNot('id', auth()->user()->id)->get();

            return view('admin.pages.access.access-list', [
                'admins' => $admins,
            ]);
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

    /**
     * View Admin Access Create
     *
     * @return mixed
     */
    public function viewAdminAccessCreate(): mixed
    {
        try {
            return view('admin.pages.access.access-create');
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);

        }
    }

    /**
     * View Admin Access Update
     *
     * @return mixed
     */
    public function viewAdminAccessUpdate($id): mixed
    {
        try {

            $admin = Admin::find($id);

            if (!$admin) {
                return redirect()->back()->with('message', [
                    'status' => 'warning',
                    'title' => 'Admin not found',
                    'description' => 'Admin not found with specified ID'
                ]);
            }

            return view('admin.pages.access.access-update', [
                'admin' => $admin
            ]);
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

    /**
     * Handle Admin Access Create
     *
     * @return mixed
     */
    public function handleAdminAccessCreate(Request $request): RedirectResponse
    {
        try {

            $validation = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:1', 'max:250'],
                'email' => ['required', 'string', 'email',  'min:1', 'max:250', 'unique:admins'],
                'phone' => ['required', 'numeric', 'digits_between:10,12', 'unique:admins'],
                'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed'],
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            $admin->password = Hash::make($request->input('password'));
            $admin->save();

            return redirect()->route('admin.view.admin.access.list')->with('message', [
                'status' => 'success',
                'title' => 'Admin access created',
                'description' => 'The admin access is successfully created.'
            ]);
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

    /**
     * Handle Admin Access Update
     *
     * @return mixed
     */
    public function handleAdminAccessUpdate(Request $request, $id): RedirectResponse
    {
        try {

            $admin = Admin::find($id);

            if (!$admin) {
                return redirect()->back()->with('message', [
                    'status' => 'warning',
                    'title' => 'Admin not found',
                    'description' => 'Admin not found with specified ID'
                ]);
            }

            $validation = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:1', 'max:250'],
                'email' => ['required', 'string', 'email',  'min:1', 'max:250', Rule::unique('admins')->ignore($id)],
                'phone' => ['required', 'numeric', 'digits_between:10,12', Rule::unique('admins')->ignore($id)],
                'password' => ['nullable', 'string', 'min:6', 'max:20', 'confirmed'],
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            if ($request->input('password')) {
                $admin->password = Hash::make($request->input('password'));
            }
            $admin->update();

            return redirect()->route('admin.view.admin.access.list')->with('message', [
                'status' => 'success',
                'title' => 'Changes saved',
                'description' => 'The changes are successfully saved.'
            ]);
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }

    /**
     * Handle Toggle Admin Access Status
     *
     * @return mixed
     */
    public function handleToggleAdminAccessStatus(Request $request): Response
    {
        try {

            $validation = Validator::make($request->all(), [
                'admin_id' => ['required', 'numeric', 'exists:admins,id']
            ]);

            if ($validation->fails()) {
                return response([
                    'status' => false,
                    'message' => $validation->errors()->first(),
                    'error' => $validation->errors()->getMessages()
                ], 200);
            }

            $admin = Admin::find($request->input('admin_id'));
            $admin->status = !$admin->status;
            $admin->update();

            return response([
                'status' => true,
                'message' => "Status successfully updated",
                'data' => $admin
            ], 200);
        } catch (Exception $exception) {
            return response([
                'status' => false,
                'message' => "An error occcured",
                'error' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Handl Admin Access Delete
     *
     * @return mixed
     */
    public function handleAdminAccessDelete($id): RedirectResponse
    {
        try {

            $admin = Admin::find($id);

            if (!$admin) {
                return redirect()->back()->with('message', [
                    'status' => 'warning',
                    'title' => 'Admin not found',
                    'description' => 'Admin not found with specified ID'
                ]);
            }

            $admin->delete();

            return redirect()->route('admin.view.admin.access.list')->with('message', [
                'status' => 'success',
                'title' => 'Admin access deleted',
                'description' => 'The admin access is successfully deleted.'
            ]);
        } catch (Exception $exception) {
            return $this->sendExceptionError($exception);
        }
    }
}
