<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\_Admin\User as UserRequest;
use Carbon\Carbon;
use App\User;
use App\Order;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userBuilder = User::query();
        $search = $this->getSearchData($request);
        $userBuilder = $this->addSerchCondition($userBuilder, $search);
        $users = $userBuilder->orderBy('id', 'asc')->paginate(100)->setPath('');

        return view('_admin.user.index')
            ->with([
                'users' => $users,
                'search' => $search,
            ])
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('_admin.user.create')
            ->with([
                'user' => $user
            ])
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest\StoreRequest $request)
    {
        $userData = $this->getUserData($request);
        $userData['password'] = bcrypt($userData['password']);

        if ($user = User::create($userData)) {
            // アクティブなユーザーとして登録する
            $user->confimarted_at = Carbon::now();
            $user->save();

            $request->session()->flash('info', '登録しました。');
            return redirect()
                ->route('users.index')
            ;
        }

        return redirect()
            ->back()
            ->withInput($variationData)
        ;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('_admin.user.edit')
            ->with('user', $user)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest\UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $userData = $this->getUserData($request);

        if(!empty($userData['password'])){
          $userData['password'] = bcrypt($userData['password']);
        }else{
          unset($userData['password']);
        }

        if ($user->update($userData)){
            return redirect()
                ->route('users.index', $request->query())
                ->with(['info' => '更新しました。'])
            ;
        }

        return redirect()
            ->back()
            ->withInput($userData)
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()
            ->route('users.index')
            ->with(['info' => '削除しました。']);
    }


    /**
     * cancel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $user = User::findOrFail($id);
        $user->canceled_at = Carbon::now();
        $user->save();

        return redirect()
            ->route('users.index')
            ->with(['info' => '退会しました。']);
    }


    /*
     * @param  \Illuminate\Http\Response
     * @return array  $user_data
     */
    private function getUserData($request)
    {
        $userData = $request->only([
            'email',
            'password',
        ]);

        return $userData;
    }


    private function getSearchData($request)
    {
        // 検索項目
        $search = $request->only([
            'id',
            'email',
        ]);

        return $search;
    }

    private function addSerchCondition($userBuilder, $search)
    {

        if (isset($search['id']) && $search['id'] != ''){
            $userBuilder
                ->where('id', 'like', "%{$search['id']}%")
            ;
        }

        if (isset($search['email']) && $search['email'] != ''){
            $userBuilder
                ->where('email', 'like', "%{$search['email']}%")
            ;
        }

        return $userBuilder;
    }

}
