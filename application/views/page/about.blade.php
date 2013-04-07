@layout('page.master')

@section('content')
    <section class="container">
        @render('partials.header', array('title' => $title))
        <div class="row-fluid">
            <div class="span12">
                <div class="well center">
                    <p>Duis a risus sed dolor placerat semper quis in urna. Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.</p>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            {{ render_each('partials.about-person', $people, 'person') }}
        </div>
    </section>
@endsection