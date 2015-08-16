@layout('layouts/dashboard')

@section('content')
<div class="row-fluid">
  {{ Form::open(URL::to_route('dashboard.users.new.check'), 'POST', array('class' => 'well form-horizontal')) }}
    <fieldset>
      <legend><h1>{{ __('application.new_user') }}</h1></legend>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('username')) {{ 'error' }} @endif">
          {{ Form::label('username', __('application.username'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>{{ Form::text('username', Input::old('username'), array('class' => 'input-xlarge', 'autofocus' => 'autofocus')) }}
            </div>
            @if ($errors->has('username'))
              <span class="help-inline"> {{ $errors->first('username') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group">
          {{ Form::label('email', __('application.email'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-envelope"></i></span>{{ Form::text('email', Input::old('email'), array('class' => 'input-xlarge')) }}
            </div>
            @if ($errors->has('email'))
              <span class="help-inline"> {{ $errors->first('email') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('first_name')) {{ 'error' }} @endif">
          {{ Form::label('first_name', __('application.first_name'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>{{ Form::text('first_name', Input::old('first_name'), array('class' => 'input-xlarge')) }}
            </div>
            @if ($errors->has('first_name'))
            <span class="help-inline"> {{ $errors->first('first_name') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('last_name')) {{ 'error' }} @endif">
          {{ Form::label('last_name', __('application.last_name'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>{{ Form::text('last_name', Input::old('last_name'), array('class' => 'input-xlarge')) }}
            </div>
            @if ($errors->has('last_name'))
            <span class="help-inline"> {{ $errors->first('last_name') }} </span>
            @endif
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group">
          <div class="controls">
            {{ Form::submit(__('application.create_user'), array('class' => 'btn btn-success')) }}
          </div>
        </div>
      </div>

    {{ Form::token() }}
  {{ Form::close() }}
</div>

@endsection

