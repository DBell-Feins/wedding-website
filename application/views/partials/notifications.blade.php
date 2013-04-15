@if (count($errors->all()) > 0)
{{ Alert::error('<h4 class="alert-heading">Warning!</h4> Please check the form below for errors')->block() }}
@endif

@if ($message = Session::get('success'))
{{ Alert::success('<h4 class="alert-heading">Success</h4>' . $message)->block() }}
@endif

@if ($message = Session::get('error'))
{{ Alert::error('<h4 class="alert-heading">Error</h4>' . $message)->block() }}
@endif

@if ($message = Session::get('warning'))
{{ Alert::warning('<h4 class="alert-heading">Warning</h4>' . $message)->block() }}
@endif

@if ($message = Session::get('info'))
{{ Alert::info('<h4 class="alert-heading">Info</h4>' . $message)->block() }}
@endif