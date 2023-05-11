@if(Session::has('warning'))
  <div class="alert alert-warning alert-dismissible mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{Session::get('warning')}}</strong>
  </div>
@endif
