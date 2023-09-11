<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user_role = Auth::user()->role->name;
        //dd($user_role);

            switch ($user_role) {

                case "Admin":
                    Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                    return to_route('adminDash');
                    break;

                case "Visitor":
                    Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                    return to_route('visitorDash');
                    break;

                default:
                    Alert::warning('login failed!','Vos identifiants sont incorrets.');
                    return redirect()->back();
            }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
