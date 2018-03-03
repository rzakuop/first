<input type="hidden" name="item_id" value="{{ $item->id }}">
@if ($errors->has('item_id'))
<span class="help-block"><strong>{{ $errors->first('item_id') }}</strong></span>
@endif

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
      <label for="input_name">利用時間 <span class="text-danger">※</span></label>
      <input type="number" name="hours" class="form-control" value="{{ Request::old('hours') ?: $order->hours }}" placeholder="例:13" max="24">
      @if ($errors->has('hours'))
      <span class="help-block"><strong>{{ $errors->first('hours') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('prefer_date') || $errors->has('prefer_date') ? ' has-error' : '' }}">
      <label for="name">希望日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="date" name="prefer_date"  class="form-control datepicker" value="{{Request::old('prefer_date') ?: $order->prefer_date}}" />      </div>
      @if ($errors->has('prefer_date'))
      <span class="help-block"><strong>{{ $errors->first('prefer_date') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('prefer_hour') || $errors->has('prefer_hour') ? ' has-error' : '' }}">
      <label for="name">希望日時(時) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="time" name="prefer_hour"  class="form-control datepicker" value="{{Request::old('prefer_hour') ?: $order->prefer_hour}}" />      </div>
      @if ($errors->has('prefer_hour'))
      <span class="help-block"><strong>{{ $errors->first('prefer_hour') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('prefer_date2') || $errors->has('prefer_date2') ? ' has-error' : '' }}">
      <label for="name">希望日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="date" name="prefer_date2"  class="form-control datepicker" value="{{Request::old('prefer_date2') ?: $order->prefer_date2}}" />      </div>
      @if ($errors->has('prefer_date2'))
      <span class="help-block"><strong>{{ $errors->first('prefer_date2') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('prefer_hour2') || $errors->has('prefer_hour2') ? ' has-error' : '' }}">
      <label for="name">希望日時(時) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="time" name="prefer_hour2"  class="form-control datepicker" value="{{Request::old('prefer_hour2') ?: $order->prefer_hour2}}" />      </div>
      @if ($errors->has('prefer_hour2'))
      <span class="help-block"><strong>{{ $errors->first('prefer_hour2') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('prefer_date3') || $errors->has('prefer_date3') ? ' has-error' : '' }}">
      <label for="name">希望日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="date" name="prefer_date3"  class="form-control datepicker" value="{{Request::old('prefer_date3') ?: $order->prefer_date3}}" />      </div>
      @if ($errors->has('prefer_date3'))
      <span class="help-block"><strong>{{ $errors->first('prefer_date3') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('prefer_hour3') || $errors->has('prefer_hour3') ? ' has-error' : '' }}">
      <label for="name">希望日時(時) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="time" name="prefer_hour3"  class="form-control datepicker" value="{{Request::old('prefer_hour3') ?: $order->prefer_hour3}}" />      </div>
      @if ($errors->has('prefer_hour3'))
      <span class="help-block"><strong>{{ $errors->first('prefer_hour3') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
      <label for="input_name">備考 <span class="text-danger">※</span></label>
      <p>来てほしい場所、その他要望を必ずご記入ください</p>
      <textarea  name="comment" class="form-control">{{ Request::old('comment') ?: $order->comment }}</textarea>
      @if ($errors->has('comment'))
      <span class="help-block"><strong>{{ $errors->first('comment') }}</strong></span>
      @endif
    </div>
  </div>
</div>
