@layout('layouts/dashboard')

@section('styles')
  {{ Basset::show('styles-dashboard-events_new.css') }}
@endsection

@section('scripts')
  {{ Basset::show('scripts-dashboard-events_new.js') }}
@endsection

@section('content')
<div class="row-fluid">
  {{ Form::open(URL::to_route('dashboard.events.new.check'), 'POST', array('class' => 'well form-horizontal')) }}
    <fieldset>
      <legend><h1>{{ __('application.new_event') }}</h1></legend>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('event_name')) {{ 'error' }} @endif">
          {{ Form::label('event_name', __('application.event_name'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-tag"></i></span>{{ Form::text('event_name', Input::old('event_name'), array('class' => 'input-xlarge', 'autofocus' => 'autofocus')) }}
            </div>
            @if ($errors->has('event_name'))
              <span class="help-inline"> {{ $errors->first('event_name') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group">
          {{ Form::label('event_place', __('application.event_place'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-map-marker"></i></span>{{ Form::text('event_place', Input::old('event_place'), array('class' => 'input-xlarge')) }}
            </div>
            @if ($errors->has('event_place'))
              <span class="help-inline"> {{ $errors->first('event_place') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('event_date')) {{ 'error' }} @endif">
          {{ Form::label('event_date', __('application.event_date'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              @if (Config::get('application.language', 'en') == 'en')
                <span class="add-on"><i class="icon-calendar"></i></span>{{ Form::text('event_date', Input::old('event_place'), array('class' => 'input-xlarge', 'data-date-format' => 'mm/dd/yyyy', 'id' => 'datepicker')) }}
              @else
                <span class="add-on"><i class="icon-calendar"></i></span>{{ Form::text('event_date', Input::old('event_place'), array('class' => 'input-xlarge', 'data-date-format' => 'dd/mm/yyyy', 'id' => 'datepicker')) }}
              @endif
            </div>
            @if ($errors->has('event_date'))
              <span class="help-inline"> {{ $errors->first('event_date') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('event_description')) {{ 'error' }} @endif">
          {{ Form::label('event_description', __('application.event_description'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::textarea('event_description', Input::old('event_description'), array('class' => 'editor')) }}
            @if ($errors->has('event_description'))
              <span class="help-inline"> {{ $errors->first('event_description') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group">
          <div class="controls">
            {{ Form::submit(__('application.create_event'), array('class' => 'btn btn-success')) }}
          </div>
        </div>
      </div>

    {{ Form::token() }}
  {{ Form::close() }}
</div>

@endsection

