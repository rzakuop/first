<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Contact as ContactRequest;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

class ContactController extends Controller //
{
    public function index()
    {
     
        return view('contact.index'); //'item.index' から改良 contactのディレクトリの中にindexがある
        
    }
    public function store(ContactRequest\StoreRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $body = $request->input('body');

        Mail::send(
            ['text' => 'mail.contact'],
            compact('name','email','body'),
            function ($m) {
                $m->from(
                    config('my.mail.from'),
                    config('my.mail.name')
                );
                $m->to(config('my.mail.to'), config('my.mail.name'));
                $m->subject(
                    'お問い合わせ'
                );
            }
        );

            return redirect(route('contact.index'))
            ->with('info', 'お問い合わせありがとうございます。')
            ;
    }
    
}
