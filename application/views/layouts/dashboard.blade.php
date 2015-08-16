<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
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

    <div class="container-fluid main">
      @include('layouts.partials.status')
      <div class="row-fluid">
        <div class="span4">
          <div class="sidebar-nav">
            <div class="well" style="padding-left: 10px; margin-right: 10px;">
              <ul class="nav nav-list">
                <li class="nav-header">{{ __('application.dashboard') }}</li>
                @if ($active == 'profile')
                  <li class="active"><a href="{{ URL::to_route('dashboard.profile') }}"><i class="icon-edit"></i> {{ __('application.profile') }}</a></li>
                @else
                  <li><a href="{{ URL::to_route('dashboard.profile') }}"><i class="icon-edit"></i> {{ __('application.profile') }}</a></li>
                @endif
                @if ($active == 'manage_users')
                  <li class="active"><a href="{{ URL::to_route('dashboard.users') }}"><i class="icon-user"></i> {{ __('application.manage_users') }}</a></li>
                @else
                  <li><a href="{{ URL::to_route('dashboard.users') }}"><i class="icon-user"></i> {{ __('application.manage_users') }}</a></li>
                @endif
                @if ($active == 'manage_events')
                  <li class="active"><a href="{{ URL::to_route('dashboard.events') }}"><i class="icon-tag"></i> {{ __('application.manage_events') }}</a></li>
                @else
                  <li><a href="{{ URL::to_route('dashboard.events') }}"><i class="icon-tag"></i> {{ __('application.manage_events') }}</a></li>
                @endif
                @if ($active == 'manage_paintings')
                  <li class="active"><a href="{{ URL::to_route('dashboard.paintings') }}"><i class="icon-picture"></i> {{ __('application.manage_paintings') }}</a></li>
                @else
                  <li><a href="{{ URL::to_route('dashboard.paintings') }}"><i class="icon-picture"></i> {{ __('application.manage_paintings') }}</a></li>
                @endif
                @if ($active == 'manage_slideshow')
                  <li class="active"><a href="{{ URL::to_route('dashboard.slideshow') }}"><i class="icon-picture"></i> {{ __('application.manage_slideshow') }}</a></li>
                @else
                  <li><a href="{{ URL::to_route('dashboard.slideshow') }}"><i class="icon-picture"></i> {{ __('application.manage_slideshow') }}</a></li>
                @endif
                <li class="divider"></li>
                <li><a href="{{ URL::to_route('session.logout') }}"><i class="icon-off"></i> {{ __('application.logout') }}</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span8">
          @yield('content')
        </div>
      </div>
    </div><!-- end container -->

    @include('layouts.partials.footer')

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
      var BASE = "<?php echo URL::base(); ?>";
      var old_tags = old_tags || [];
      var painting_tags = painting_tags || [];
      var all_tags = all_tags || [];
    </script>

    @section('scripts')
      {{ Basset::show('scripts.js') }}
    @yield_section
  </body>
</html>


