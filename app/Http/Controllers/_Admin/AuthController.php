<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Requests\_Admin\Auth as AuthRequest;

class AuthController extends Controller
{
    use ThrottlesLogins;

    public function signinForm()
    {
        return view('_admin.auth.signin_form');
    }

    public function signin(AuthRequest\SigninRequest $request)
    {
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (auth()->guard('admin')->attempt($credentials, $remember)) {
            $this->clearLoginAttempts($request);

            return redirect()
                ->intended('_admin')
                ->with('info', 'ログインしました。')
                ;
        }

        if (!$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return redirect()
            ->back()
            ->withInput($credentials)
            ->withErrors([
                'email' => '正しいE-Mail、パスワードを入力してください。',
            ]);
    }

    public function signout()
    {
        auth()->guard('admin')->logout();
        return redirect()
            ->route('_admin.auth.signin')
            ->with('info', 'ログアウトしました。')
            ;
    }


    protected function username()
    {
        return 'email';
    }


    protected function loginUsername()
    {
        return 'email';
    }

    protected function getLockoutErrorMessage($seconds)
    {
        return 'しばらく時間をおいてもう一度やり直してください。';
    }
}
