@layout('page.master')

@section('content')
<section class="container">
    @render('partials.header', array('title' => $title))
    <div class="row-fluid">
            <div class="span12">
                <div class="well center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a massa dolor. Ut imperdiet ligula id orci feugiat ornare. Fusce vehicula sodales turpis, at vestibulum tellus sodales id. Praesent hendrerit adipiscing vestibulum. Nulla vitae aliquam velit. Integer hendrerit dignissim purus ut condimentum. Nulla iaculis ornare nibh, fringilla vestibulum mauris iaculis vel. Mauris risus ante, aliquet quis condimentum at, ultricies quis mi. Nam tristique arcu eget magna hendrerit tempus. Suspendisse potenti. Cras sit amet vestibulum nisl.</p>
                    
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