<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AlertService;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index(): View
    {
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:150', 'unique:admins,email,' . auth('admin')->user()->id],
            'avatar' => ['nullable', 'image', 'max:2048']
        ]);

        $user = auth('admin')->user();
        if ($request->hasFile('avatar')) {
            $filepath = $this->uploadFile($request->file('avatar'), $user->avatar);
            $filepath ? $user->avatar = $filepath : null;
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();
        // for save red underline is ok, because of auth.

        AlertService::updated();

        return redirect()->back();
    }

    public function passwordUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $user = auth('admin')->user();
        $user->password = bcrypt($request->password);
        $user->save();

        AlertService::updated();

        return redirect()->back();
    }
}
