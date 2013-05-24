@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
        <div class="span12">
            <div class="well registry">
                <p>After an exhausting search and a little bit too much fun with hand-held scanners, we've compiled a wedding registry fit for a couple who have way too much old stuff.</p>
                <p>If you can't figure out what to get (and honestly, there's a lot to pick from) gift cards are a great option and are always appreciated!</p>
                <p>We're registered at the following stores:</p>
                <div class="bor"></div>
                <ul class="registry">
                    <li>{{ HTML::image_link('http://www.crateandbarrel.com/Gift-Registry/David-Bell-feins-and-Elizabeth-Kamaroff/r5029231', 'img/crate_and_barrel.png', 'Crate and Barrel') }}</li>
                    <li>{{ HTML::image_link('http://www.amazon.com/registry/wedding/1XEL1VWXYBBNO', 'img/amazon.png', 'Amazon.com') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection