@layout('page.master')

@section('content')
    <div class="container section section-home">
    <div class="row">
        <div class="span12">
            <div class="hero">
                <!-- Getting married -->
                <h1>We're Getting Married!</h1>
                <div class="well">
                    <!-- date -->
                    <h3>August 11, 2013</h3>
                    <!-- Use the below link to create line with heartin -->
                    <div class="bor"></div>
                    <!-- Name -->
                    <h2>Dave {{ HTML::image('img/thumb-heart-sm.png', 'Heart'); }} Liz&nbsp;&nbsp;&nbsp;</h2>
                    <div class="bor"></div>
                    <!-- Small para -->
                    <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean sodales augue ac lacus hendrerit sed rhoncus erat hendrerit. Vivamus vel ultricies elit. </p>
                </div>
                <!-- Button. Note down the class "button" -->
                <div class="button">
                    {{ HTML::link_to_action('wedding', 'Wedding', array(), array('class'=>'anchorLink')); }}
                    &nbsp;
                    {{ HTML::link_to_action('rsvp', 'RSVP', array(), array('class'=>'anchorLink')); }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection