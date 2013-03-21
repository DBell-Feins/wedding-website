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
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
                'image_url' => 'http://placehold.it/120x120'
            ));
            Person::create(array(
                'name' => 'Elizabeth Kamaroff',
                'slug' => 'liz',
                'role' => 'Bride',
                'description' => 'Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna  cursus</a> ac ultrices magna.',
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
                'image_url' => '/img-wedding-party/jon.png'
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
