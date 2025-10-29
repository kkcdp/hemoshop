<?php

namespace App\Http\Controllers\Frontend;

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
        return view('frontend.dashboard.account.index');
    }

    public function profileUpdate(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email,' . auth('web')->user()->id],
            'avatar' => ['nullable', 'image', 'max:2048']
        ]);

        $filepath = $this->uploadFile($request->file('avatar'));

        $user = auth('web')->user();
        $filepath ? $user->avatar = $filepath : null;
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

        $user = auth('web')->user();
        $user->password = bcrypt($request->password);
        $user->save();

        AlertService::updated();

        return redirect()->back();
    }
}
