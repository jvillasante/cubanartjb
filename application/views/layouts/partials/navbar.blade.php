<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="{{ URL::to_route('home.index') }}"><em>{{ __('application.name_acronym') }}</em></a>
      <div class="nav-collapse">
        <ul class="nav">
          @if (isset($nav) && $nav == 'work')
            <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('application.work') }} <b class="caret"></b></a>
          @else
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('application.work') }} <b class="caret"></b></a>
          @endif
            <ul class="dropdown-menu">
              <li><a href="{{ URL::to_route('work.index', array('painter' => 'brouwer')) }}">{{ __('application.brouwer') }}</a></li>
              <li><a href="{{ URL::to_route('work.index', array('painter' => 'jacas')) }}">{{ __('application.jacas') }}</a></li>
              <li class="divider"></li>
              <li><a href="{{ URL::to_route('tags.index') }}"> {{ __('application.tags') }}</a></li>
              <li><a href="{{ URL::to_route('work.index') }}"> {{ __('application.all') }}</a></li>
            </ul>
          </li>
          @if (isset($nav) && $nav == 'events')
            <li class="active"><a href="{{ URL::to_route('events.index') }}">{{ __('application.events') }}</a></li>
          @else
            <li><a href="{{ URL::to_route('events.index') }}">{{ __('application.events') }}</a></li>
          @endif
          @if (isset($nav) && $nav == 'contact')
            <li class="active"><a href="{{ URL::to_route('home.contact') }}">{{ __('application.contact') }}</a></li>
          @else
            <li><a href="{{ URL::to_route('home.contact') }}">{{ __('application.contact') }}</a></li>
          @endif
          @if (isset($nav) && $nav == 'about')
            <li class="active"><a href="{{ URL::to_route('home.about') }}">{{ __('application.about') }}</a></li>
          @else
            <li><a href="{{ URL::to_route('home.about') }}">{{ __('application.about') }}</a></li>
          @endif
          @if (isset($nav) && $nav == 'faq')
            <li class="active"><a href="{{ URL::to_route('home.faq') }}">{{ __('application.faq') }}</a></li>
          @else
            <li><a href="{{ URL::to_route('home.faq') }}">{{ __('application.faq') }}</a></li>
          @endif
        </ul>

        <ul class="nav pull-right">
          @if (Config::get('application.language') == 'en')
            <li><a title="{{ __('application.switch_lang') }}" href="{{ URL::to_route('language.set', array('lang' => 'sp')) }}?redirect_to={{ URI::current() }}">{{ HTML::image('img/flags/spain24x24.png', null) }}</a></li>
          @else
            <li><a title="{{ __('application.switch_lang') }}" href="{{ URL::to_route('language.set', array('lang' => 'en')) }}?redirect_to={{ URI::current() }}">{{ HTML::image('img/flags/england24x24.png', null) }}</a></li>
          @endif
        </ul>

        <form class="navbar-form form-search pull-right" method="GET" action="{{ URL::to_route('work.search') }}" accept-charset="UTF-8">
          <div class="input-append">
            <input type="text" name="q" class="search-query" placeholder="{{ __('application.search') }}" />
            <button type="submit" class="btn"><i class="icon-search"></i></button>
          </div>
        </form>

      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
