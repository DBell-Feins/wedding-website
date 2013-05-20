<li>

    <div class="person fluid-row">
        <div class="span4">{{ HTML::image($person->image_url, ''); }}</div>
        <div class="span8">
            <h3>{{ $person->first_name }} {{ $person->last_name }}</h3>
            <h5>{{ $person->role }}</h5>
            <p>{{ $person->description  }}</p>
            <blockquote>
              <p>{{ $person->quote  }}</p>
              <small>
                  <cite title="{{ $person->first_name }} {{ $person->last_name }}">{{ $person->first_name }} {{ $person->last_name }}</cite>
              </small>
            </blockquote>
        </div>
    </div>
</li>