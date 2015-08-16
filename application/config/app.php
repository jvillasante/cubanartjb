<?php

/*
|--------------------------------------------------------------------------
| JBArtGroup Configuration
|--------------------------------------------------------------------------
|
| This file is for configuration purposes. Bear in mind that every value
| on this file is separeted by colon.
|
*/
return array(
	/*
	|--------------------------------------------------------------------------
	| Paginator Count
	|--------------------------------------------------------------------------
	|
	| Here goes the results count of the paginator. Effectively this is the count
	| of records that will be shown when a paginator is in use.
	*/
  'paginator_count' => 10,

	/*
	|--------------------------------------------------------------------------
	| Email Address
	|--------------------------------------------------------------------------
	|
	| The group email address.
	*/
  'email_address' => 'cubanartjb@gmail.com',

	/*
	|--------------------------------------------------------------------------
	| Facebook Link
	|--------------------------------------------------------------------------
	|
	| Here goes the facebook link.
	|   Ex. 'facebook_link' => 'http://www.facebook.com/jbartgroup',
	*/
  'facebook_link' => '#',

	/*
	|--------------------------------------------------------------------------
	| Twitter Link
	|--------------------------------------------------------------------------
	|
	| Here goes the twitter link.
	|   Ex. 'twitter_link' => 'http://www.twitter.com/jbartgroup',
	*/
  'twitter_link'  => '#',

	/*
	|--------------------------------------------------------------------------
	| Links
	|--------------------------------------------------------------------------
	|
  | Here goes the links that shows on the footer under Useful Links. The first
  | value is the link and the second is the text that is shown on the web.
	|   Ex. array('http://www.tate.org.uk/modern' => 'tate.org.uk/modern'),
	*/
  'links' => array(
    array('http://www.tate.org.uk/modern' => 'tate.org.uk/modern'),
    array('http://www.moma.org' => 'moma.org'),
  ),

	/*
	|--------------------------------------------------------------------------
	| Mails
	|--------------------------------------------------------------------------
	|
  | Here goes the mails that shows on the footer under Mails. The first
  | value is the link and the second is the text that is shown on the web.
	|   Ex. array('http://www.tate.org.uk/modern' => 'tate.org.uk/modern'),
	*/
  'mails' => array(
    array('brouwertart@cubarte.cult.cu' => 'Juan L. Brouwer'),
    array('robertlour@infomed.sld.cu' => 'Oscar J. Jacas'),
  ),
);
