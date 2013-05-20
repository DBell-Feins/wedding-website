<!-- NOTIFICATIONS -->
@if (count($errors->all()) > 0)
<div id="notifications">
  {{ Alert::error('<h4 class="alert-heading">Warning!</h4> Please check the form below for errors')->block() }}
</div>
@endif

@if ($message = Session::get('success'))
<div id="notifications">
  {{ Alert::success('<h4 class="alert-heading">Success</h4>' . $message)->block() }}
</div>
@endif

@if ($message = Session::get('error'))
<div id="notifications">
  {{ Alert::error('<h4 class="alert-heading">Error</h4>' . $message)->block() }}
</div>
@endif

@if ($message = Session::get('warning'))
<div id="notifications">
  {{ Alert::warning('<h4 class="alert-heading">Warning</h4>' . $message)->block() }}
</div>
@endif

@if ($message = Session::get('info'))
<div id="notifications">
  {{ Alert::info('<h4 class="alert-heading">Info</h4>' . $message)->block() }}
</div>
@endif
<!-- END NOTIFICATIONS -->