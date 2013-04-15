@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
        <div class="span12">
            <div class="well">
                <h3>Please fill out the form below</h3>
                <p>Enter your email address and the RSVP ID included in your invitation.</p>
                <div class="span8">
                    @include('forms.rsvp-auth')
                </div>
            </div>
        </div>
    </div>
@endsection