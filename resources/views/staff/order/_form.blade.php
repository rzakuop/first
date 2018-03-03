<input type="hidden" name="order_id" value="{{ $order->id }}">
@if ($errors->has('order_id'))
<span class="help-block"><strong>{{ $errors->first('order_id') }}</strong></span>
@endif

{{-- <div class="row">
  <div class="col-sm-6"> --}}
    <div class="form-group{{ $errors->has('ok') ? ' has-error' : '' }}">
      <label for="ok" class="control-label col-md-4">依頼受け入れ <span class="text-danger">※</span></label>
      <?php $okOld = Request::old('ok') ?: $order->ok;?>
      <div class="col-md-8">
        <label class="checkbox-inline"><input type="radio" name="ok" value="1"@if($okOld) checked="checked"@endif> 承諾する</label>
        <label class="checkbox-inline"><input type="radio" name="ok" value="0"> お断りする</label>
        @if ($errors->has('ok'))
        <span class="help-block"><strong>{{ $errors->first('ok') }}</strong></span>
        @endif
      </div>
    </div>
  {{-- </div>
</div> --}}

{{-- <div class="row">
  <div class="col-sm-6"> --}}
    <div class="form-group{{ $errors->has('prefer') ? ' has-error' : '' }}">
      <label for="prefer" class="control-label col-md-4">作業日時 <span class="text-danger">※</span></label>
      <?php $preferOld = Request::old('prefer') ?: $order->prefer;?>
      <div class="col-md-8">
        <select name="prefer" class="form-control">
          <option value="">選択してください</option>
          <option value="1">第一希望 ({{ $order->prefer_at }})</option>
          @if($order->prefer_at2)<option value="2">第二希望 ({{ $order->prefer_at2 }})</option>@endif
          @if($order->prefer_at3)<option value="3">第三希望 ({{ $order->prefer_at3 }})</option>@endif
        </select>
        @if ($errors->has('prefer'))
        <span class="help-block"><strong>{{ $errors->first('prefer') }}</strong></span>
        @endif
      </div>
    </div>
  {{-- </div>
</div> --}}

{{-- <div class="row">
  <div class="col-sm-6"> --}}
    <div class="form-group{{ $errors->has('staff_comment') ? ' has-error' : '' }}">
      <label for="staff_comment" class="control-label col-md-4">返信内容 <span class="text-danger">※</span></label>
      <div class="col-md-8">
        <textarea  name="staff_comment" class="form-control">{{ Request::old('staff_comment') ?: $order->staff_comment }}</textarea>
        <p>必ずご記入ください</p>
        @if ($errors->has('staff_comment'))
        <span class="help-block"><strong>{{ $errors->first('staff_comment') }}</strong></span>
        @endif
      </div>
    </div>
  {{-- </div>
</div> --}}
