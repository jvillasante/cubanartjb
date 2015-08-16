@layout('layouts/main')

@section('content')
  <div>
    <p><strong>{{ __('application.reset_confirm_header') }}</strong></p>
    <p>{{ __('application.reset_confirm_link') }} {{ HTML::link($hash_link) }}</p>
  </div>
@endsection
