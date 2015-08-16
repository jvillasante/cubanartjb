@layout('layouts/dashboard')

@section('content')
<div class="btn-toolbar pull-left">
  <form class="form-search" method="GET" action="{{ URL::to_route('dashboard.events.search') }}">
    <div class="input-append">
      <input type="text" name="q" class="search-query" placeholder="{{ __('application.search_events') }}" />
      <input type="submit" class="btn" value="{{ __('application.search') }}" />
    </div>
  </form>
</div>
<div class="btn-toolbar pull-right">
  <a href="{{ URL::to_route('dashboard.events.new') }}" class="btn btn-success">{{ __('application.new_event') }}</a>
</div>

<div class="row-fluid clearfix">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>{{ __('application.event') }}</th>
        <th style="width: 100px;"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events->results as $event)
      <tr>
        <td>{{ e($event->title()) }}</td>
        <td>
          <a href="{{ URL::to_route('dashboard.events.edit', array('id' => $event->id)) }}" class="btn btn-inverse btn-mini pull-left">{{ __('application.edit') }}</a>
          {{ Form::open(URL::to_route('dashboard.events.delete', array('id' => $event->id)), 'DELETE', array('class' => 'smal-labels pull-right')) }}
            <input type="submit" class="btn btn-inverse btn-mini" value="{{ __('application.remove') }}" />
          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="row-fluid clearfix">
  @if (Input::has('q'))
    <div class="pull-right">{{ $events->appends(array('q' => Input::get('q')))->links(2) }}</div>
  @else
    <div class="pull-right">{{ $events->links(2) }}</div>
  @endif
</div>

@endsection

