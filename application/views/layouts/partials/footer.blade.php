<footer class="footer">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <blockquote>
          <p class="testimonial">{{ __('application.quote') }}</p>
          <p class="name">{{ __('application.quote_author') }}</p>
        </blockquote>
      </div>
    </div>
    <hr class="soften1">
    <div class="row-fluid">
      <div class="span4">
        <h4>{{ __('application.navigation') }}</h4>
        <ul class="footer-links">
          <li><a href="{{ URL::to_route('home.index') }}">{{ __('application.home') }}</a></li>
          <li><a href="{{ URL::to_route('events.index') }}">{{ __('application.events') }}</a></li>
          <li><a href="{{ URL::to_route('home.contact') }}">{{ __('application.contact') }}</a></li>
          <li><a href="{{ URL::to_route('home.about') }}">{{ __('application.about') }}</a></li>
          <li><a href="{{ URL::to_route('home.faq') }}">{{ __('application.faq') }}</a></li>
          @if (!Sentry::check())
            <li><a href="{{ URL::to_route('session.login') }}">{{ __('application.sign_in') }}</a></li>
          @else
            <li><a href="{{ URL::to_route('dashboard.profile') }}">{{ __('application.dashboard') }}</a></li>
            <li><a href="{{ URL::to_route('session.logout') }}">{{ __('application.logout') }}</a></li>
          @endif
        </ul>
      </div>
      <div class="span4">
        <h4>{{ __('application.links') }}</h4>
        {{ HtmlHelpers::render_links() }}
      </div>
      <div class="span4">
        <h4>{{ __('application.who') }}</h4>
        <p>{{ __('application.about_small') }}</p>
        <ul class="bordered-list">
          <li class="img-location"><strong>{{ __('application.address_heading') }}</strong><div style="margin-left:20px;">{{ __('application.address') }}</div></li>
          <li class="img-phone"><strong>{{ __('application.phones') }}</strong><div style="margin-left:20px;">{{ __('application.phone_numbers') }}</div></li>
          <li class="img-skype"><strong>{{ __('application.mails') }}</strong><div style="margin-left:20px;">{{ HtmlHelpers::render_mails() }}</div></li>
        </ul>
        <br />
        {{ HtmlHelpers::render_social() }}
      </div>
    </div>
    <hr class="soften1 copyhr">
    <div class="row-fluid copyright">
      <div class="span12">
        {{ __('application.author') }}
        <br />
        {{ __('application.photographer') }}
        <br />
        <br />
        {{ __('application.note') }}
      </div>
    </div>
  </div>
</footer>

