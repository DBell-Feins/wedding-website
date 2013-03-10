@layout('page.master')

@section('content')
    <section class="container">
            @render('partials.header', array('title' => $title))
            <div class="row-fluid">
                <div class="span6">
                    <div class="about">
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
                    <div class="about">
                        <!-- Travel and Accomodation -->
                        <h4><i class="icon-home"></i> Accommodations</h4>
                        <a href="#">Royal Korem Garden</a><br>
                        12, New Charka Road<br>
                        New York City, NY 43423<br>
                        (123) 456-7890<br>
                        <a href="http://maps.google.com">Get Direction</a>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
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
        </div>
    </section>
@endsection