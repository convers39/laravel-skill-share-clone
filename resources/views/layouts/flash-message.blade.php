<div class="col col-md-12">


  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

  @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

  @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger alert-block fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{!! implode('', $errors->all('<div>:message</div>')) !!} </strong>
    </div>
  @endif

</div>
