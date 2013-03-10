<li>
    <div class="person fluid-row">
        <div class="span5">{{ HTML::image($person->image_url, ''); }}</div>
        <div class="span7">
            <h3>{{ $person->name }}</h3>
            <h5>{{ $person->role }}</h5>
            <p>{{ $person->description  }}</p>
        </div>
    </div>
</li>