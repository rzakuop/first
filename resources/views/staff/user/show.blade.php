@extends('staff.layout.master')

<?php

    $layout = [
        'title' => 'ユーザー情報',
    ];

?>

@section('content')
<h1>プロフィール</h1>

        <div class="regist_box mb-4">
          <div class="rg_inner">
            <div class="form-group row mb-0">
              <div class="col-md-2">プロフィール</div>
              <div class="col-md-10">
                <div class="mb-2">{{ $user->name }}</div>
                <div class="mb-2">{{ $user->area }}</div>
                <div class="mb-2">{{ $user->description }}</div>
                <div> <a href="{{ route('staff.user.edit') }}" class="btn btn-outline-primary btn-sm"><span>プロフィールを変更する</span></a></div>
              </div>
            </div>
            <!-- / .row -->
          </div>
          <!-- / .rg_inner -->
        </div>
        <!-- / .regist_box -->
        <div class="regist_box mb-4">
          <div class="rg_inner">
            <div class="form-group row mb-0">
              <div class="col-md-2">メール</div>
              <div class="col-md-10">
                <div class="mb-2">{{ $user->email }}</div>
                <div> <a href="{{ route('staff.user.edit_email') }}" class="btn btn-outline-primary btn-sm"><span>メールアドレスを変更する</span></a></div>
              </div>
            </div>
            <!-- / .row -->
          </div>
          <!-- / .rg_inner -->
        </div>
        <!-- / .regist_box -->
        <div class="regist_box mb-4">
          <div class="rg_inner">
            <div class="form-group row mb-0">
              <div class="col-md-2">パスワード</div>
              <div class="col-md-10">
                <div class="mb-2">********</div>
                <div><a href="{{ route('staff.user.edit_password') }}" class="btn btn-outline-primary btn-sm"><span>パスワードを変更する</span></a></div>
              </div>
            </div>
            <!-- / .row -->
          </div>
          <!-- / .rg_inner -->
        </div>
        <!-- / .regist_box -->

        <div class="regist_box mb-4">
          <div class="form-group row mb-0">
            <div class="h4 mb-3 col-md-2">口座情報</div>
          </div>

          <div class="rg_inner">
            <div class="form-group row mb-0">
              <div class="col-md-2">銀行</div>
              <div class="col-md-10">
                <div class="mb-2">{{ $user->bank_name }}</div>
              </div>
            </div>
            <!-- / .row -->
            <div class="form-group row mb-0">
              <div class="col-md-2">支店名</div>
              <div class="col-md-10">
                <div class="mb-2">{{ $user->bank_branch_name }}</div>
              </div>
            </div>
            <!-- / .row -->
            <div class="form-group row mb-0">
              <div class="col-md-2">口座番号</div>
              <div class="col-md-10">
                <div class="mb-2">{{ $user->bank_account_number }}</div>
              </div>
            </div>
            <!-- / .row -->
            <div class="form-group row mb-0">
              <div class="col-md-2">口座名義</div>
              <div class="col-md-10">
                <div class="mb-2">{{ $user->getFullBankAccountName() }}</div>
              </div>
            </div>
            <!-- / .row -->
            <div class="form-group row mb-0">
              <div class="h4 mb-3 col-md-2"></div>
              <?php
                $staff = auth('staff')->user();

                // 口座情報未入力の場合
                if (
                    empty($staff->bank_name)
                    || empty($staff->bank_name)
                    || empty($staff->bank_account_number)
                    || empty($staff->bank_account_last_name)
                    || empty($staff->bank_account_first_name)
                ):
              ?>
              <div class="col-md-10 mb-3"><a href="{{ route('staff.user.edit_bank') }}" class="btn btn-outline-primary btn-sm"><span>口座情報を登録する</span></a></div>
              <?php else:?>
              <div class="col-md-10 mb-3"><a href="{{ route('staff.user.edit_bank') }}" class="btn btn-outline-primary btn-sm"><span>口座情報を変更する</span></a></div>
              <?php endif;?>
          </div>
          <!-- / .row -->
          </div>
          <!-- / .rg_inner -->
        </div>
        <!-- / .regist_box -->
@endsection
