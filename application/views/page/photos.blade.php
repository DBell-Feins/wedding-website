@layout('page.master')

@section('content')
    <section class="container">
        @render('partials.header', array('title' => $title))
        <div class="row-fluid">
           <div class="span12">
                @if($num == null)
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($photos as $photo)
                            <li>
                                {{ HTML::image($photo); }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    {{ HTML::image($photos); }}
                @endif
           </div>
       </div>
   </section>
@endsection