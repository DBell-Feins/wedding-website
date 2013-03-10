@layout('page.master')

@section('content')
 <div class="container section section-photos">
    <div class="row">
        <div class="span12">
            <div class="head">
                <div class="bor"></div>
                <h2>Photos</h2>
                <div class="bor"></div>
            </div>
        </div>
        <div class="span12">
            <div class="container">
                @if($num == null)
                    <div id="slides">
                        @foreach($photos as $photo)
                            {{ HTML::image($photo); }}
                        @endforeach
                    </div>
                @else
                    {{ HTML::image($photos); }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection