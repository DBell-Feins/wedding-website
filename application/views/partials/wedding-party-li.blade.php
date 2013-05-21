<li>

    <div class="person fluid-row">
        <div class="span4">{{ HTML::image($person->image_url, ''); }}</div>
        <div class="span8">
            <h3>{{ $person->first_name }} {{ $person->last_name }}</h3>
            <h5>{{ $person->role }}</h5>
            {{ $person->description  }}
            <h3>Fun Fact</h3>
            <blockquote>
              <p>{{ $person->quote }}</p>
            </blockquote>
        </div>
    </div>
</li>