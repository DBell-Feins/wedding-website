@layout('page.master')

@section('content')
<section class="container">
    @render('partials.header', array('title' => $title))
    <div class="row-fluid">
        <div class="span12">
            <div class="well center">
                    <div id="{{ $person['slug'] }}" class="wedding-party row-fluid">
                        <div class="span4">{{ HTML::image($person['image_url'], ''); }}</div>
                        <div class="span8"><h3>{{ $person['role'] }}</h3>
                        <p>{{ $person['description'] }}</p></div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection