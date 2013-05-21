@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
        <div class="span12">
            <div class="well center story">
                <p>Liz and Dave have known each other for a <em>really</em> long time.</p>

                <p>They met in a faraway land known as The Berkshires, at "Camp Eisner, a place for Living Judaism" in 1997. That's right. Dave and Liz met a Jewish sleep away camp.</p>

                <p>Liz caught Dave's attention from the moment he saw her. A pretty, multi-color haired girl, with a great sense of humor and a funky fashion sense. Dave was shy and didn't know how to approach her. Luckily Liz noticed him; a cute, friendly guy with great taste in music who laughed at her jokes!</p>

                <p>It wasn't until the camp trip to Israel that the sparks began to fly.</p>

                <p>Because of a death in the family Liz's parents were not able to take her to the airport. She arrived at La Guardia airport scared and alone, clutching her suitcase. Out of the crowds of people she spotted a familiar face: taller, leaner, and framed in a black baseball cap and turquoise Blink 182 t-shirt. It was Dave! The crowds seemed to melt away as he walked toward her with a smile on his face.</p>

                <p class="emph">Hi," he said. "Want some help with your stuff?"</p>

                <p>The rest of the trip they were inseparable: sitting on the bus together; sharing falafel; telling stories and jokes; listening to music; taking long walks on beautiful beaches; traveling through ancient towns; swapping loves and fears; and being drawn deeper and deeper into a romantic connection both were too young to fully appreciate. The relationship continued long-distance between New York and Massachusetts for a year after but because they were young it couldn't last. They needed to explore on their own, to make mistakes and to embark on new adventures.</p>

                <p>Three years passed before they spoke again.</p>

                <p>Liz was at Bennington College going through a rocky patch when, on a whim, she decided to call Dave and see what he was up to. They talked on the phone for hours as if no time had passed at all. He suggested she come to Boston over winter vacation for a visit. He agreed to meet her at South Station. She got off the train lugging a suitcase and headed in the direction of a familiar smiling face. There she was. Her hair now short and red, looking confused and lost once again.</p>

                <p class="emph">"Hi," he said reaching for her bag. "Want some help with that?"</p>
                <p>They've been together ever since.</p>
            </div>
        </div>
    </div>
    <div class="row-fluid bridegroom">
        {{ render_each('partials.about-person', $people, 'person') }}
    </div>
@endsection