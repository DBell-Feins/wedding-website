@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
            <div class="span12">
                <div class="well center">
                    <p>For our wedding we've assembled a crack team of our closest friends and family to accompany us and, if necessary, support us as seconds and alternates should we need to protect our honor in a duel.</p>

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
@endsection