@layout('layouts/dashboard')

@section('content')
<div class="row-fluid">
  <div class="btn-toolbar pull-left">
    <form class="form-search" method="GET" action="{{ URL::to_route('dashboard.paintings.search') }}">
      <div class="input-append">
        <input type="text" name="q" class="search-query" placeholder="{{ __('application.search_paintings') }}" />
        <input type="submit" class="btn" value="{{ __('application.search') }}" />
      </div>
    </form>
  </div>
  <div class="btn-toolbar pull-right">
    <a href="{{ URL::to_route('dashboard.paintings.new') }}" class="btn btn-success">{{ __('application.new_painting') }}</a>
  </div>

  <div class="row-fluid clearfix">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>{{ __('application.painting') }}</th>
          <th style="width: 100px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($paintings->results as $painting)
          <tr>
            <td>{{ e($painting->title()) }}</td>
            <td>
              <a href="{{ URL::to_route('dashboard.paintings.edit', array('painting_id' => $painting->id)) }}" class="btn btn-inverse btn-mini pull-left">{{ __('application.edit') }}</a>
              {{ Form::open(URL::to_route('dashboard.paintings.delete', array('painting_id' => $painting->id)), 'DELETE', array('class' => 'smal-labels pull-right')) }}
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
      <div class="pull-right">{{ $paintings->appends(array('q' => Input::get('q')))->links(2) }}</div>
    @else
      <div class="pull-right">{{ $paintings->links(2) }}</div>
    @endif
  </div>
</div>
@endsection

