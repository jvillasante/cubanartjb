<?php

Bundle::start('basset');

Basset::collection('styles', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
});

Basset::collection('scripts', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
});

Basset::collection('scripts-home-index', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/jquery.cycle2.min.js');
  $collection->add('js/libs/jquery.cycle2.carousel.min.js');
  $collection->add('js/home.js');
});

Basset::collection('scripts-dashboard-profile', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/bootstrap/bootstrap-tab.js');
});

Basset::collection('styles-tags-show', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
  $collection->add('css/prettyPhoto.css');
});

Basset::collection('scripts-tags-show', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/jquery.prettyPhoto.js');
  $collection->add('js/work.js');
});

Basset::collection('styles-work-index', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
  $collection->add('css/prettyPhoto.css');
});

Basset::collection('scripts-work-index', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/jquery.prettyPhoto.js');
  $collection->add('js/work.js');
});

Basset::collection('styles-dashboard-paintings_new', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
  $collection->add('css/bootstrap-tagmanager.css');
});

Basset::collection('scripts-dashboard-paintings_new', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/bootstrap/bootstrap-fileupload.js');
  $collection->add('js/libs/bootstrap/bootstrap-typeahead.js');
  $collection->add('js/libs/bootstrap/bootstrap-tagmanager.js');
  $collection->add('js/tags.js');
});

Basset::collection('styles-dashboard-paintings_edit', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
  $collection->add('css/bootstrap-tagmanager.css');
});

Basset::collection('scripts-dashboard-paintings_edit', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/bootstrap/bootstrap-fileupload.js');
  $collection->add('js/libs/bootstrap/bootstrap-typeahead.js');
  $collection->add('js/libs/bootstrap/bootstrap-tagmanager.js');
  $collection->add('js/tags.js');
});

Basset::collection('scripts-dashboard-slideshow', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/bootstrap/bootstrap-fileupload.js');
});

Basset::collection('styles-dashboard-events_new', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
  $collection->add('css/datepicker.css');
});

Basset::collection('scripts-dashboard-events_new', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/bootstrap/bootstrap-datepicker.js');
  $collection->add('js/events.js');
});

Basset::collection('styles-dashboard-events_edit', function($collection) {
  $collection->add('css/normalize.css');
  $collection->add('css/bootstrap.css');
  $collection->add('css/bootstrap-responsive.css');
  $collection->add('css/styles.css');
  $collection->add('css/datepicker.css');
});

Basset::collection('scripts-dashboard-events_edit', function($collection) {
  $collection->add('js/libs/jquery.min.js');
  $collection->add('js/libs/bootstrap/bootstrap-dropdown.js');
  $collection->add('js/libs/bootstrap/bootstrap-alert.js');
  $collection->add('js/libs/bootstrap/bootstrap-datepicker.js');
  $collection->add('js/events.js');
});

