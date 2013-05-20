@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
        <div class="span12">
            <div class="well center">
                <div id="{{ $person->slug }}" class="wedding-party row-fluid">
                    <div class="span4">{{ HTML::image($person->image_url, ''); }}</div>
                    <div class="span8">
                        <h3>{{ $person->role }}</h3>
                        <p>{{ $person->description }}</p>
                        <blockquote>
                            <p>{{ $person->quote }}</p>
                            <small>
                                <cite title="{{ $person->first_name }} {{ $person->last_name }}">{{ $person->first_name }} {{ $person->last_name }}</cite>
                            </small>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection