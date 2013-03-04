@layout('page.master')

@section('content')
<div class="container section section-location">
    <div class="row">
        <div class="span12">
             <div class="head">
                <div class="bor"></div>
                    <h2>Location</h2>
                <div class="bor"></div>
            </div>
        </div>
        <div class="span6">
            <div class="wedding">
                <!-- Ceremony details -->
                <h4><i class="icon-heart"></i> Ceremony & Reception</h4>
                <a href="#">Royal Korem Church</a><br>
                12, New Charka Road<br>
                New York City, NY 43423<br>
                (123) 456-7890<br>
                <a href="http://maps.google.com">Get Direction</a>
            </div>
        </div>
        <div class="span6">
            <div class="wedding">
                <!-- Travel and Accomodation -->
                <h4><i class="icon-home"></i> Accommodations</h4>
                <a href="#">Royal Korem Garden</a><br>
                12, New Charka Road<br>
                New York City, NY 43423<br>
                (123) 456-7890<br>
                <a href="http://maps.google.com">Get Direction</a>
            </div>
        </div>
        <div class="span12">
            <div class="wedding">
                <h4><i class="icon-truck"></i> Travel</h4>
                <h5>By Car:</h5>
                Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor.<br>
                <h5>By Flight:</h5>
                Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor.
            </div>
        </div>
    </div>
</div>
@endsection