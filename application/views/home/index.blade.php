@layout('layouts/main')

@section('scripts')
  {{ Basset::show('scripts-home-index.js') }}
@endsection

@section('content')
  <div class="marketing">
    <h1>{{ __('application.name') }}</h1>
    <p class="marketing-byline">{{ __('application.motto') }}</p>
    <hr class="soften">
    <div class="row-fluid">
      <div class="span4"> {{ HTML::image('img/think-creative.png', 'Think Creative') }}
        <h2>{{ __('application.header1') }}</h2>
        <p>{{ __('application.comment1') }}</p>
      </div>
      <div class="span4"> {{ HTML::image('img/think-creative.png', 'Think Creative') }}
        <h2>{{ __('application.header2') }}</h2>
        <p>{{ __('application.comment2') }}</p>
      </div>
      <div class="span4"> {{ HTML::image('img/think-creative.png', 'Think Creative') }}
        <h2>{{ __('application.header3') }}</h2>
        <p>{{ __('application.comment3') }}</p>
      </div>
    </div>
    <hr class="soften" />
    <div class="row-fluid textleft">
      <div class="span8">
        <h2> <span class="firstword">{{ __('application.our') }}</span> {{ __('application.group') }}</h2>
        {{ __('application.about_long') }}
      </div>
      <div class="span4">
        <h2>{{ __('application.tags') }}</h2>
        <div class="tags">
          {{ HtmlHelpers::render_tag_cloud() }}
        </div>
      </div>
    </div>
  </div>
@endsection

