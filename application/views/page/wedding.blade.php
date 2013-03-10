@layout('page.master')

@section('content')
<section class="container">
    @render('partials.header', array('title' => $title))
    <div class="row-fluid">
            <div class="span12">
                <div class="well center">
                    <p>Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus  rutrum aliquet.</p>
                </div>
            </div>
        </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="flexslider well wedding">
                <ul class="slides">
                @foreach($people as $person)
                    @render('partials.wedding-party-li', array('person' => $person))
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection