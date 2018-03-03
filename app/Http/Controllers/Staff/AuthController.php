<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Requests\Staff\Auth as AuthRequest;

class AuthController extends Controller
{
    use ThrottlesLogins;

    public function signinForm()
    {
        return view('staff.auth.signin_form');
    }

    public function signin(AuthRequest\SigninRequest $request)
    {
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (auth()->guard('staff')->attempt($credentials, $remember)) {
            $this->clearLoginAttempts($request);

            $user = auth()->guard('staff')->user();
            if (! $user->isConfimarted()) {
                auth()->guard('staff')->logout();
                return redirect()
                    ->route('staff.auth.signin')
                    ->with('info', 'メール認証を完了してください。')
                    ;
            }

            return redirect()
                ->intended('/staff')
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
        auth()->guard('staff')->logout();
        return redirect()
            ->route('staff.auth.signin')
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
