<div class="span6">
    <div class="about">
        <h3>{{ $person->first_name }} {{$person->last_name}} <span class="ameta">- {{ $person->role }}</span></h3>
        <div class="row">
            <div class="span4">
                {{ HTML::image($person->image_url, ''); }}
            </div>
            <div class="span8">
                {{ $person->quote }}
            </div>
        </div>
        <div class="row">
            {{ $person->description }}
        </div>
    </div>
</div>