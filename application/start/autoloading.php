<?php

Autoloader::map(array(
	'ValidateException' => path('app') . 'libraries/exceptions.php',
  'HtmlHelpers'       => path('app') . 'libraries/html_helpers.php',
  'ImageUtils'        => path('app') . 'libraries/image_utils.php',
  'PorterStemmer'     => path('app') . 'libraries/porter_stemmer.php',
  'Search'            => path('app') . 'libraries/search.php',
  'Cleaner'           => path('app') . 'libraries/search.php',
  'DateFmt'           => path('app') . 'libraries/DateFmt.php',
));

