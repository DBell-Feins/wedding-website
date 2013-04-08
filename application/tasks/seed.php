<?php
    class Seed_Task {
        /**
         * Populate the db with seed data
         * @param type $args
         */
        public function run($args)
        {
            Person::create(array(
                'name' => 'David Bell-Feins',
                'slug' => 'dave',
                'role' => 'Groom',
                'description' => '
                <p>I grew up in Belmont, MA, a small suburb of Boston. Little did I know that after getting my BA in English and Political Science at UMass Boston, I would fall into a vat of creative acid and emerge as <strong>WEB DEVELOPER MAN</strong>! Now, I help solve social, economic, and medical issues at home and abroad using emerging technologies  at <a href="http://www.abtassociates.com" target="_blank">Abt Associates</a> and in my spare time, I do my best to get as many laughs out of Liz as I can.</p>',
                'quote' => '
                <blockquote>
                    <p>Dave is ever so smart and ever so clever. He is the bringer of sandwiches!</p>
                    <small>
                        <cite title="Liz Kamaroff">Liz Kamaroff</cite>
                    </small>
                </blockquote>',
                'image_url' => 'http://placehold.it/120x120'
            ));
            Person::create(array(
                'name' => 'Elizabeth Kamaroff',
                'slug' => 'liz',
                'role' => 'Bride',
                'description' => '
                <p>Growing up in New York City, NY means I\'ll always be a city girl at heart. Still, in 2004 I packed up and moved to Boston to be with Dave during the <a href="http://www.youtube.com/watch?v=NTF1lb8fw6A" target="_blank">greatest Red Sox frenzy</a> this city has ever seen. Even though I miss New York\'s food and museums, there\'s no substitute for finding the love of my life.</p>
                <p>Now I work at Wellington Elementary School\'s after care program with the 3rd grade, where I can be the beautiful crafting princess I\'ve always wanted to be.</p>',
                'quote' => '
                <blockquote>
                    <p>Liz always has my back. Through thick and thin, she\'s always been there for me. She\'s my own personal superhero.</p>
                    <small>
                        <cite title="Dave Bell-Feins">Dave Bell-Feins</cite>
                    </small>
                </blockquote>',
                'image_url' => 'http://placehold.it/120x120'
            ));

            Person::create(array(
                'name' => 'Autumn Bullard',
                'slug' => 'autumn',
                'role' => 'Maid of Honor',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => '/img/wedding-party/autumn.png'
            ));
            Person::create(array(
                'name' => 'Emily Valenza',
                'slug' => 'emily',
                'role' => 'Bridesmaid',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => '/img/wedding-party/emily.png'
            ));
            Person::create(array(
                'name' => 'Ashley Ward',
                'slug' => 'ashley',
                'role' => 'Bridesmaid',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => '/img/wedding-party/ashley.png'
            ));

            Person::create(array(
                'name' => 'Jonathan Bell-Feins',
                'slug' => 'jon',
                'role' => 'Best Man',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => '/img/wedding-party/jon.png'
            ));
            Person::create(array(
                'name' => 'Curtis Chin',
                'slug' => 'curtis',
                'role' => 'Groomsman',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => '/img/wedding-party/curtis.png'
            ));
            Person::create(array(
                'name' => 'Robert Kamaroff',
                'slug' => 'rob',
                'role' => 'Groomsman',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => 'http://placehold.it/200x200'
            ));
        }
    }
