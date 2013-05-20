<div class="span6">
    <div class="about">
        <h3>{{ $person->first_name }} {{ $person->last_name }} <span class="ameta">- {{ $person->role }}</span></h3>
        <div class="row">
            <div class="span4">
                {{ HTML::image($person->image_url, ''); }}
            </div>
            <div class="span8">
                <blockquote>
              <p>{{ $person->quote }}</p>
              <small>
                  <cite title="{{ $person->first_name }} {{ $person->last_name }}">{{ $person->first_name }} {{ $person->last_name }}</cite>
              </small>
            </blockquote>
            </div>
        </div>
        <div class="row">
            {{ $person->description }}
        </div>
    </div>
</div>