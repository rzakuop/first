<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\User;
use Mail;
use Carbon\Carbon;
use App\Http\Requests\ResetPassword as ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function requestForm()
    {
        return view('reset_password.request_form');
    }

    public function request(ResetPasswordRequest\RequestRequest $request)
    {
        $user = User::where([
            ['email', $request->email],
            ['deleted_at', null],
        ])->first();
        if (is_null($user)) {
            return redirect()
                ->back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => '"メールアドレス"を正しく入力してください'])
                ;
        }

        $token = hash_hmac('sha256', Str::random(40), config('app.key'));

        $timestamps = $user->timestamps;
        $user->timestamps = false;

        $user->reset_password_token = $token;
        $user->reset_password_sent_at = Carbon::now();
        $user->save();

        $user->timestamps = $timestamps;

        Mail::send(
            ['text' => 'mail.reset_password_request'],
            compact('token', 'user'),
            function ($m) use ($user) {
                $m->from(
                    config('my.mail.from'),
                    config('my.mail.name')
                );
                $m->to($user->email, $user->first_name);
                $m->subject(
                    config('my.reset_password_request.mail_subject')
                );
            }
        );

        return view('reset_password.request');
    }

    public function resetForm(Request $request, $token)
    {
        $user = User::where('reset_password_token', $token)
            ->where(
                'reset_password_sent_at',
                '>',
                Carbon::now()->subMinutes(
                    config('my.reset_password_request.expires_in')
                )
            )
            ->firstOrFail()
            ; // TODO: should not just fail
        return view('reset_password.reset_form')->withUser($user);
    }

    public function reset(ResetPasswordRequest\ResetRequest $request)
    {
        $user = User::where('reset_password_token', $request->token)
            ->where(
                'reset_password_sent_at',
                '>',
                Carbon::now()->subMinutes(
                    config('my.reset_password_request.expires_in')
                )
            )
            ->firstOrFail()
            ; // TODO: should not just fail

        $user->password = bcrypt($request->password);
        $user->reset_password_token = null;
        $user->reset_password_sent_at = null;
        $user->save();

        return redirect()->route('auth.signin')->with(
            'info',
            'パスワードを再設定しました。'
        );
    }
}
