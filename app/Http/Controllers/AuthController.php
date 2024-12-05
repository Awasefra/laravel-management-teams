<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ErrorHandler;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct(protected AuthService $authService) {}

    public function index()
    {
        return view('login');
    }

    public function authenticate(LoginRequest $request)
    {

        try {
            $this->authService->login($request);

            return redirect()->route('home');
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return back()->with('error', $error['message']);
        }
    }

    public function logout(): RedirectResponse
    {
        try {
            $this->authService->logout();

            return redirect()->route('/home');
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return back()->with('error', $error['message']);
        }
    }
}
