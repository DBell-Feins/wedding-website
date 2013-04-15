@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row location">
        <div class="span6">
            <div class="about">
                <!-- Ceremony details -->
                <h4><i class="icon-heart"></i> Ceremony & Reception</h4>
                <div class="row">
                    <div class="span2">
                        <div id="" class="vcard">
                            <div class="org"><a href="http://www.zukas.com/">Zukas Hilltop Barn</a></div>
                            <div class="adr">
                                <div class="street-address">89 Smithville Road</div>
                                <span class="locality">Spencer</span>,
                                <span class="region">MA</span>,
                                <span class="postal-code">01562</span>
                            </div>
                            <div class="tel">(508) 885-5320</div>
                        </div>
                    </div>
                    <div class="span3">
                        {{ HTML::image('img/venue.png', '', array('id' => 'venue')) }}
                    </div>
                </div>
                @render('partials.venue-modal')
            </div>
        </div>
        <div class="span6">
            <div class="about">
                <!-- Travel and Accomodation -->
                <h4><i class="icon-home"></i> Accommodations</h4>
                <div class="row">
                    <div class="span2">
                        <div id="" class="vcard">
                            <div class="org"><a href="http://www.sturbridgehosthotel.com/">Sturbridge Host Hotel & Conference Center</a></div>
                            <div class="adr">
                                <div class="street-address">366 Main Street</div>
                                <span class="locality">Sturbridge</span>,
                                <span class="region">MA</span>,
                                <span class="postal-code">01566</span>
                            </div>
                            <div class="tel">(508) 347-7393</div>
                        </div>
                    </div>
                    <div class="span3">
                        {{ HTML::image('img/hotel.png', '', array('id' => 'hotel')) }}
                    </div>
                </div>
                @render('partials.hotel-modal')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div class="about">
                <h4><i class="icon-truck"></i> Travel</h4>
                <h5>By Car:</h5>
                Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor.<br>
                <h5>By Flight:</h5>
                Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor.
            </div>
        </div>
    </div>
@endsection