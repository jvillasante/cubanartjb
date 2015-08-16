<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="The J&B Abstract Art Group is the fruit of collaboration between two young Cuban artists: Juan Leo Brouwer Pardo and Oscar Javier Jacas Hernandez. From a friendship of more than 10 years emerge this project blended by the self admirations that feel these artists and their preference by Abstract Painting.">
    <meta name="author" content="Julio C. Villasante">
    <title>
      @if (isset($title) && !empty($title))
        {{ $title }}
      @else
        {{ HtmlHelpers::name() }}
      @endif
    </title>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="{{ URL::to_asset('js/libs/html5shiv.js') }}" type="text/javascript" media="all"></script>
    <![endif]-->

    <!-- Le styles -->
    @section('styles')
      {{ Basset::show('styles.css') }}
    @yield_section

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{ URL::to_asset('img/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::to_asset('img/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::to_asset('img/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::to_asset('img/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::to_asset('img/ico/apple-touch-icon-57-precomposed.png') }}">
  </head>
  <body>
    @include('layouts.partials.navbar')

    @if ((stripos($title, 'home') == true) || (stripos($title, 'casa') == true))
      @include('layouts.partials.masthead')
    @endif

    @if ((stripos($title, 'about') == true) || (stripos($title, 'acerca') == true))
      @include('layouts.partials.masthead_about')
    @endif

    <div class="container-fluid main">
      @include('layouts.partials.status')
      <div class="row-fluid">
        @yield('content')
      </div>
    </div><!-- end container -->

    @include('layouts.partials.footer')

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">var BASE = "<?php echo URL::base(); ?>";</script>
    <script type="text/javascript">var url_to_work = "<?php echo URL::to_route('work.index'); ?>";</script>
    @section('scripts')
      {{ Basset::show('scripts.js') }}
    @yield_section
  </body>
</html>


