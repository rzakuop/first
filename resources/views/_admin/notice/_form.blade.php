<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
  <label for="input_name" class="control-label col-md-4">タイトル <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <input type="text" name="title" class="form-control" id="title" value="{{ Request::old('title') ?: $notice->title }}">
    @if ($errors->has('title'))
    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
  <label for="input_name" class="control-label col-md-4">内容 <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <textarea name="content" class="form-control" id="content">{{ Request::old('content') ?: $notice->content }}</textarea>
    @if ($errors->has('content'))
    <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('start_at') || $errors->has('end_at') ? ' has-error' : '' }}">
  <label for="name" class="control-label col-md-4">掲載期間 <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <div class="input-group">
      <input type="text" name="start_at"  class="form-control datepicker" value="{{Request::old('start_at') ?: $notice->start_at}}" />
      <span class="input-group-addon">～</span>
      <input type="text" name="end_at"  class="form-control datepicker" value="{{Request::old('end_at') ?: $notice->end_at}}" />
    </div>
    @if ($errors->has('start_at'))
    <span class="help-block"><strong>{{ $errors->first('start_at') }}</strong></span>
    @endif
    @if ($errors->has('end_at'))
    <span class="help-block"><strong>{{ $errors->first('end_at') }}</strong></span>
    @endif
  </div>
</div>
