@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}!</li>
      @endforeach
      </ul>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="aletr" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif
