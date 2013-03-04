@layout('page.master')

@section('content')
<div class="container section section-rsvp">
    <div class="row">
        <div class="span12">
            <div class="head">
                <div class="bor"></div>
                <h2>RSVP</h2>
                <div class="bor"></div>
            </div>
        </div>
        <div class="span12">
            <div class="well">
                <!-- Contact details -->
                <h3>Please fill out the below form</h3>
                <p>Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat.</p>
                <form class="form-inline">
                <div class="controls controls-row">
                <input class="span2" type="text" placeholder="Name">
                <input class="span2" type="text" placeholder="Email">
                <input class="span2 " type="text" placeholder="Attending?">
                <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
                <p>If you have any questions, let me know <a href="mailto:something@gmail.com">something@gmail.com</a></p>
            </div>
        </div>
    </div>
</div>
@endsection