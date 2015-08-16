@layout('layouts/main')

@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="page-header">
        <div class="row-fluid">
          <div class="span5">
            <h1>{{ __('application.events') }}</h1>
          </div>
          <div class="span7">
            <div class="row-fluid clearfix">
              @if (Input::has('q'))
                <div class="pull-right">{{ $events->appends(array('q' => Input::get('q')))->links(2) }}</div>
              @else
                <div class="pull-right">{{ $events->links(2) }}</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid faq">
    <div class="span6">
      @for ($i = 0; $i < $count; $i++)
        <div class="question-section">
          <h4>{{ e($events->results[$i]->name) }}</h4>
          <p><i class="icon-calendar"></i> {{ $events->results[$i]->getDate() }}</p>
          <p><i class="icon-map-marker"></i> {{ e($events->results[$i]->place) }}</p>
          <p>{{ e($events->results[$i]->description) }}</p>
        </div>
      @endfor
    </div>
    @if ($i < count($events->results))
      <div class="span6">
        @for ($i = $i; $i < count($events->results); $i++)
          <div class="question-section">
            <h4>{{ e($events->results[$i]->name) }}</h4>
            <p><i class="icon-calendar"></i> {{ $events->results[$i]->getDate() }}</p>
            <p><i class="icon-map-marker"></i> {{ e($events->results[$i]->place) }}</p>
            <p>{{ e($events->results[$i]->description) }}</p>
          </div>
        @endfor
      </div>
    @endif
  </div>
  <hr class="soften2" />
  <div class="row-fluid clearfix">
    @if (Input::has('q'))
      <div class="pull-right">{{ $events->appends(array('q' => Input::get('q')))->links(2) }}</div>
    @else
      <div class="pull-right">{{ $events->links(2) }}</div>
    @endif
  </div>
@endsection

