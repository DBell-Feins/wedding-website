@layout('layouts.master')

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h1>We're Getting Married!</h1>
            <div class="well" id="intro">
                <h3>August 11, 2013</h3>
                <div class="bor"></div>
                <h2>Dave {{ HTML::image('img/thumb-heart-sm.png', 'Heart'); }} Liz&nbsp;&nbsp;&nbsp;</h2>
                <div class="bor"></div>
                <div>
                    <p>David Bell-Feins and Elizabeth Kamaroff are tying the knot. Please join us on Sunday August 11, 2013 and share in the joyous occasion. We can't wait to celebrate with all of our family and friends.</p>
                    <p>While you're here, please be sure to {{ HTML::link_to_action('rsvp', 'RSVP'); }}, check out our {{ HTML::link_to_action('registry', 'registry'); }}, and learn a little bit more {{ HTML::link_to_action('about', 'about us'); }}.
                    </p>
                </div>
            </div>
            <div class="button">
                {{ HTML::link_to_action('wedding', 'Wedding'); }}
                &nbsp;
                {{ HTML::link_to_action('rsvp', 'RSVP'); }}
                &nbsp;
                {{ HTML::link_to_action('about', 'About Us'); }}
            </div>
        </div>
    </div>
@endsection