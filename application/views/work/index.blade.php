@layout('layouts/main')

@section('styles')
  {{ Basset::show('styles-work-index.css') }}
@endsection

@section('scripts')
  {{ Basset::show('scripts-work-index.js') }}
@endsection

@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="page-header">
        <div class="row-fluid">
          <div class="span5">
            <h1>{{ __('application.work') }} <small>{{ $painter }}</small></h1>
          </div>
          <div class="span7">
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
        <div class="span4">
          <h2>{{ e($painting->name) }}</h2>
          <p>{{ e($painting->comment) }}</p>
          <h5>{{ __('application.painting_about') }}</h5>
          <ul>
            <li>{{ e($painting->type) }}</li>
            <li>{{ e($painting->dimensions) }}</li>
            <li><a href="{{ URL::to_route('home.contact') }}">{{ e($painting->painter) }}</a></li>
            <li>{{ e($painting->year) }} </li>
          </ul>
          @if (!empty($painting->tags))
            <h5>{{ __('application.tags') }}</h5>
            {{ HtmlHelpers::show_tags($painting->tags) }}
          @endif
        </div>
        <div class="span8 work-item-image-container">
          <div class="work-item-overlay">
            <div class="inner">
              <ul>
                <li><a rel="prettyPhoto[gallery]" href="{{ HtmlHelpers::image_path($painting->image_path, 'medium') }}" title="{{ e(HtmlHelpers::painting_title($painting)) }}" class="gallery-btn">{{ __('application.view_gallery') }}</a></li>
              </ul>
            </div>
          </div>
          {{ HTML::image(HtmlHelpers::image_path($painting->image_path, 'medium'), e($painting->name)) }}
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

