<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Notifications\UserPasswordNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'phone'    => 'required|max:15|unique:' . User::class,
        ]);

        $password = Str::random(8);

        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'password'     => Hash::make($password),
            'activated_at' => Carbon::now(),
        ]);

        $user->notify(new UserPasswordNotification($password));

        return redirect(RouteServiceProvider::LOGIN)->with('notification', [
            'message' => 'Berhasil melakukan registrasi. Silahkan check email untuk mengetahui password anda.',
            'type'    => 'success'
        ]);
    }
}
