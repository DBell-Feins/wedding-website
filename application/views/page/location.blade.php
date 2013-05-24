@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row location">
        <div class="span6">
            <div class="about">
                <!-- Ceremony details -->
                <h4><i class="icon-heart"></i> Ceremony &amp; Reception</h4>
                @render('partials.loc-modal')
                <div class="row">
                    <div class="span2">
                        <div id="" class="vcard">
                            <div class="org"><a href="http://www.zukas.com/">Zukas Hilltop Barn</a></div>
                            <div class="adr">
                                <div class="street-address">89 Smithville Road</div>
                                <span class="locality">Spencer</span>,
                                <span class="region">MA</span>
                                <span class="postal-code">01562</span>
                            </div>
                            <div class="tel">(508) 885-5320</div>
                        </div>
                    </div>
                    <div class="span3">
                        {{ HTML::image('img/venue.png', '', array('id' => 'venue')) }}
                    </div>
                </div>

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
                                <span class="region">MA</span>
                                <span class="postal-code">01566</span>
                            </div>
                            <div class="tel">(508) 347-7393</div>
                        </div>
                    </div>
                    <div class="span3">
                        {{ HTML::image('img/hotel.png', '', array('id' => 'hotel')) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12 about directions">
            <h4><i class="icon-truck"></i> Travel</h4>
            <div class="span5 pull-left">
                <h5>By Car:</h5>
                <p>For more detailed directions click the map images above or enter the addresses in your mapping software of choice.</p>
                <dl>
                    <dt>From New York/Connecticut</dt>
                    <dd>Take I-84E then continue through Sturbridge into Spencer.</dd>
                    <dt>From Boston</dt>
                    <dd>Take I-90W towards Worcester.</dd>
                </dl>
            </div>
            <div class="span5 pull-right">
                <h5>By Air:</h5>
                <p>The closest major airports are <a href="http://www.massport.com/logan-airport/Pages/Default.aspx">Boston Logan International Airport</a> and <a href="http://www.bradleyairport.com/home/">Bradley International Airport</a> in Connecticut. If you're flying, make sure to rent a car with a GPS unit. It will make your life much easier!</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

@section('css')
    @parent
    {{ Asset::container('leaf-header.ie7')->styles() }}
    {{ Asset::container('leaf-header')->styles() }}
@endsection

@section('footer')
    {{ Asset::container('leaf-footer')->scripts() }}
    @parent
@endsection