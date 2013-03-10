@layout('page.master')

@section('content')
    <section class="container">
        @render('partials.header', array('title' => $title))
        <div class="row-fluid">
            <div class="span12">
                <div class="well">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non felis et metus adipiscing scelerisque sed ut purus. Aliquam scelerisque leo quis felis cursus varius. Nullam blandit condimentum lorem in facilisis.</p>
                    <p>Vivamus at dui orci. Mauris id mi lorem. Suspendisse tempus justo in dui suscipit sed rhoncus dolor ultrices. Cras viverra sollicitudin feugiat. Phasellus elementum feugiat rutrum. Suspendisse potenti. Aliquam posuere erat ipsum. Vivamus imperdiet feugiat placerat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non felis et metus adipiscing scelerisque sed ut purus. Aliquam scelerisque leo quis felis cursus varius. Nullam blandit condimentum lorem in facilisis.</p>
                    <p>Vivamus at dui orci. Mauris id mi lorem. Suspendisse tempus justo in dui suscipit sed rhoncus dolor ultrices. Cras viverra sollicitudin feugiat. Phasellus elementum feugiat rutrum. Suspendisse potenti. Aliquam posuere erat ipsum. Vivamus imperdiet feugiat placerat.</p>
                </div>
            </div>
        </div>
    </section>
@endsection