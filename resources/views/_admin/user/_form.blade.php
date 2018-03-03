<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="input_name" class="control-label col-md-4">メールアドレス</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="email" name="email" value="{{ Request::old('email') ?: $user->email }}">
      @if ($errors->has('email'))
          <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
      @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="input_name" class="control-label col-md-4">パスワード</label>
    <div class="col-md-8">
      <input type="password" class="form-control" id="password" name="password" value="">
      @if ($errors->has('password'))
          <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
      @endif
    </div>
</div>
