<?php
namespace App\Http\Controllers\_Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\_Admin\Notice as NoticeRequest;
use App\Notice;
use Carbon\Carbon;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $notices = Notice::query();
      $notices = $notices->orderBy('id', 'asc')->paginate(100)->setPath('');
      return view('_admin.notice.index')
          ->with([
            'notices' => $notices,
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
        $notice = new Notice ;
        return view('_admin.notice.create')
            ->with([
                'notice' => $notice
          ])
       ;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest\StoreRequest $request)
    {
        $noticeData = $this->getNoticeData($request);
        $noticeData['start_at'] .= ' 00:00:00';
        $noticeData['end_at'] .= ' 23:59:59';

        if ($notice = Notice::create($noticeData)) {
            $request->session()->flash('info', '登録しました。');
            return redirect()
                ->route('notices.index')
            ;
        }
        return redirect()
            ->back()
            ->withInput($noticeData)
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
         $notice = \App\Notice::findOrFail($id);
         $notice->start_at = Carbon::parse($notice->start_at)->format('Y-m-d');
         $notice->end_at = Carbon::parse($notice->end_at)->format('Y-m-d');

         return view('_admin.notice.edit')
             ->with('notice', $notice)
         ;
     }
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(NoticeRequest\UpdateRequest $request, $id)
     {
         $notice = Notice::findOrFail($id);
         $noticeData = $this->getNoticeData($request);
         $noticeData['start_at'] .= ' 00:00:00';
         $noticeData['end_at'] .= ' 23:59:59';

         if ($notice->update($noticeData)){
             return redirect()
                 ->route('notices.index', $request->query())
                 ->with(['info' => '更新しました。'])
             ;
         }
         return redirect()
             ->back()
             ->withInput($noticeData)
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
         Notice::destroy($id);
         session()->flash('info', '削除しました。');
         return redirect()->route('notices.index');
     }
     /*
      * @param  \Illuminate\Http\Response
      * @return array  $user_data
      */
     private function getNoticeData($request)
     {
        $noticeData = $request->only([
             'title',
             'content',
             'start_at',
             'end_at'
        ]);
        return $noticeData;
     }
}
