@layout('layouts/main')

@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="page-header">
        <div class="row-fluid">
          <h1>{{ __('application.work') }} <small>{{ __('application.tags') }}</small></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="work" id="portfolio">
    <div class="tags well offset2 span8">
      {{ HtmlHelpers::render_tag_cloud() }}
    </div>
  </div>
@endsection

