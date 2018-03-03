<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\_Admin\Admin as AdminRequest;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $adminBuilder = Admin::query();
        $search = $this->getSearchData($request);
        $adminBuilder = $this->addSerchCondition($adminBuilder, $search);
        $admins = $adminBuilder->orderBy('id', 'asc')->paginate(100)->setPath('');

        return view('_admin.admin.index')
            ->with([
                'admins' => $admins,
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
        $admin = new Admin ;
        return view('_admin.admin.create')
            ->with([
                'admin' => $admin
          ])
       ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest\StoreRequest $request)
    {

        $adminData = $this->getAdminData($request);
        $adminData['password'] = bcrypt($adminData['password']);

        if ($admin = Admin::create($adminData)) {

            $request->session()->flash('info', '登録しました。');
            return redirect()
                ->route('admins.index')
            ;
        }

        return redirect()
            ->back()
            ->withInput($adminData)
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
        $admin = \App\Admin::findOrFail($id);
        return view('_admin.admin.edit')
            ->with('admin', $admin)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest\UpdateRequest $request, $id)
    {
        $adminData = $this->getAdminData($request);
        $admin = Admin::findOrFail($id);

        if(!empty($adminData['password'])){
          $adminData['password'] = bcrypt($adminData['password']);
        }else{
          unset($adminData['password']);
        }

        if ($admin->update($adminData)){
            return redirect()
                ->route('admins.index', $request->query())
                ->with(['info' => '更新しました。'])
            ;
        }

        return redirect()
            ->back()
            ->withInput($adminData)
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
        Admin::destroy($id);
        session()->flash('info', '削除しました。');
        return redirect()->route('admins.index');
    }


    /*
     * @param  \Illuminate\Http\Response
     * @return array  $adminData
     */
    private function getAdminData($request)
    {
        $adminData = $request->only([
            'email',
            'password',
            'password_confirmation',
        ]);

        return $adminData;
    }

    private function getSearchData($request)
    {
        // 検索項目
        $search = $request->only([
            'email',
        ]);

        return $search;
    }

    private function addSerchCondition($adminBuilder, $search)
    {
        if (isset($search['email']) && $search['email'] !=''){
            $adminBuilder
                ->where('email', 'like', "%{$search['email']}%")
            ;
        }

        return $adminBuilder;
    }
}
