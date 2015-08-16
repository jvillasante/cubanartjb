@layout('layouts/main')

@section('styles')
  {{ Basset::show('styles-tags-show.css') }}
@endsection

@section('scripts')
  {{ Basset::show('scripts-tags-show.js') }}
@endsection

@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="page-header">
        <div class="row-fluid">
          <div class="span4">
            <h1>{{ __('application.work') }} <small>{{ $tag }}</small></h1>
          </div>
          <div class="span8">
            <div class="row-fluid clearfix">
              @if (Input::has('q'))
                <div class="pull-right">{{ $paintings->appends(array('q' => Input::get('q')))->links(2) }}</div>
              @else
                <div class="pull-right">{{ $paintings->links(2) }}</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="work" id="portfolio">
    @forelse ($paintings->results as $painting)
      <div class="row-fluid work-item food">
        <div class="span3">
          <h2>{{ e($painting->name) }}</h2>
          <p>{{ e($painting->comment) }}</p>
          <h5>{{ __('application.painting_about') }}</h5>
          <ul>
            <li>{{ e($painting->type) }}</li>
            <li>{{ e($painting->dimensions) }}</li>
            <li>{{ e($painting->painter) }}</li>
            <li>{{ e($painting->year) }}</li>
          </ul>
        </div>
        <div class="span9 work-item-image-container">
          <div class="work-item-overlay">
            <div class="inner">
              <ul>
                <li><a rel="prettyPhoto[gallery]" href="{{ HtmlHelpers::image_path($painting->image_path, 'medium') }}" class="gallery-btn">{{ __('application.view_gallery') }}</a></li>
              </ul>
            </div>
          </div>
          {{ HTML::image(HtmlHelpers::image_path($painting->image_path, 'medium'), $painting->name) }}
        </div>
      </div>
    @empty
      <h4 class="pull-center">{{ __('application.no_paintings') }}</h4>
    @endforelse
  </div>
  <hr class="soften2" />
  <div class="row-fluid clearfix">
    @if (Input::has('q'))
      <div class="pull-right">{{ $paintings->appends(array('q' => Input::get('q')))->links(2) }}</div>
    @else
      <div class="pull-right">{{ $paintings->links(2) }}</div>
    @endif
  </div>
@endsection

