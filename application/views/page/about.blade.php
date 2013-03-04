@layout('page.master')

@section('content')
    <div class="container section section-about">
    <div class="row">
        <div class="span12">
            <!-- Title -->
            <div class="head">
                <div class="bor"></div>
                <h2>About Us</h2>
                <div class="bor"></div>
            </div>
        </div>
        <div class="span12">
            <div class="well center">
                <div class="head">
                    <!-- Our love story -->
                    <h3>Our Story</h3>
                    <div class="bor"></div>
                    <p>Duis a risus sed dolor placerat semper quis in urna. Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.</p>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="about">
                <!-- Groom details with photo -->
                <h3>{{ $dave->name }} <span class="ameta">- {{ $dave->role }}</span></h3>
                <p>{{ HTML::image($dave->image_url, ''); }}{{ $dave->description }}</p>
            </div>
        </div>
        <div class="span6">
            <div class="about">
                <!-- bride details with photo -->
                <h3>{{ $liz->name }} <span class="ameta">- {{ $liz->role }}</span></h3>
                <p>{{ HTML::image($liz->image_url, ''); }}{{ $liz->description }}</p>
            </div>
        </div>
    </div>
</div>
@endsection