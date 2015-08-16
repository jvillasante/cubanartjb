@layout('layouts/dashboard')

@section('content')
<div class="btn-toolbar pull-left">
  <form class="form-search" method="GET" action="{{ URL::to_route('dashboard.users.search') }}">
    <div class="input-append">
      <input type="text" name="q" class="span12 search-query" placeholder="{{ __('application.search_users') }}" />
      <input type="submit" class="btn" value="{{ __('application.search') }}" />
    </div>
  </form>
</div>
<div class="btn-toolbar pull-right">
  <a href="{{ URL::to_route('dashboard.users.new') }}" class="btn btn-success">{{ __('application.new_user') }}</a>
</div>

<div class="row-fluid clearfix">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>{{ __('application.username') }}</th>
        <th>{{ __('application.email') }}</th>
        <th>{{ __('application.full_name') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users->results as $user)
      <tr>
        <td>{{ e($user->username) }}</td>
        <td>{{ e($user->email) }}</td>
        <td>{{ e($user->full_name()) }}</td>
        <td>
          {{ Form::open(URL::to_route('dashboard.users.delete', array('user_id' => $user->id)), 'DELETE', array('class' => 'smal-labels pull-right')) }}
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
    <div class="pull-right">{{ $users->appends(array('q' => Input::get('q')))->links(2) }}</div>
  @else
    <div class="pull-right">{{ $users->links(2) }}</div>
  @endif
</div>

@endsection

