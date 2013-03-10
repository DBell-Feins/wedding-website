@layout('page.master')

@section('content')
{{ Log::info('<pre>' . print_r($person, true) . '</pre>'); }}
<div class="container section section-wedding">
    <div class="row">
        <div class="span12">
            <div class="head">
                <div class="bor"></div>
                <h2>The Wedding Party</h2>
                <div class="bor"></div>
            </div>
        </div>
        <div class="span8 offset2">
            <div class="wedding">
                <div id="{{ $person['slug'] }}" class="wedding-party">
                    <h3>{{ $person['name'] }} <span class="ameta">- {{ $person['role'] }}</span></h3>
                    <p>{{ HTML::image($person['image_url'], ''); }}{{ $person['description'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection