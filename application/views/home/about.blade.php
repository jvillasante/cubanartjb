@layout('layouts/main')

@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="page-header">
        <div class="row-fluid">
          <div class="span12">
            <h1>{{ __('application.about') }} {{ __('application.name') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <h2>{{ __('application.brouwer_full') }}</h2>
      {{ __('application.brouwer_about') }}
    </div>

    <div class="span6">
      <h2>{{ __('application.jacas_full') }}</h2>
      {{ __('application.jacas_about') }}
    </div>
  </div>

@endsection

