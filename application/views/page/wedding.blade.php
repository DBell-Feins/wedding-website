@layout('page.master')

@section('content')
<div class="container section section-wedding">
    <div class="row">
        <div class="span12">
            <div class="head">
                <div class="bor"></div>
                <h2>The Wedding Party</h2>
                <div class="bor"></div>
            </div>
        </div>
        <div class="span12">
            <div class="wedding">
                <!-- Wedding details -->
                <h3><i class="icon-glass"></i> Wedding Party</h3>
                <p>Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus  rutrum aliquet.</p>
                <div class="flexslider">
                    <ul class="slides">
                    @foreach($people as $person)
                        <li>
                            <div class="person">
                                <img src="{{ $person->image_url }}" alt="">
                                <div>
                                    <h4>{{ $person->name }}</h4>
                                    <h5>{{ $person->role }}</h5>
                                    <p>{{ $person->description }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection