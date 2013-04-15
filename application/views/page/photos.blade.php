@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
       <div class="span12">
            @if($num == null)
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($photos as $photo)
                        <li>
                            {{ HTML::image($photo) }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @else
                {{ HTML::image($photos) }}
            @endif
       </div>
   </div>
@endsection