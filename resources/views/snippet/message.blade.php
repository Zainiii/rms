@if($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {!! $errors->first() !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeAlert()"></button>
</div>

@elseif(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! session()->get('success') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeAlert()"></button>
  </div>
@endif


