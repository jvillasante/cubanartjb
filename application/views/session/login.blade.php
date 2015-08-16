@layout('layouts/main')

@section('content')
  {{ Form::open(URL::to_route('session.login'), 'POST', array('class' => 'form-horizontal well span8 offset2')) }}
    <fieldset>
      <legend>
        <h1>{{ __('application.log_in') }}</h1>
      </legend>

      <div class="control-group @if ($errors->has('email')) {{ 'error' }} @endif">
        {{ Form::label('email', __('application.email'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span>{{ Form::text('email', Input::old('email'), array('class' => 'input-xlarge', 'autofocus' => 'autofocus')) }}
          </div>
          @if ($errors->has('email'))
            <span class="help-inline"> {{ $errors->first('email') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group @if ($errors->has('password')) {{ 'error' }} @endif">
        {{ Form::label('password', __('application.password'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-asterisk"></i></span>{{ Form::password('password', array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('password'))
            <span class="help-inline"> {{ $errors->first('password') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" id="remember-me" name="remember-me" @if (Input::old('remember-me')) {{"checked=yes"}} @endif />
              {{ __('application.remember_me') }}
          </label>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          {{ Form::submit(__('application.log_in'), array('class' => 'btn btn-success')) }}
        </div>
      </div>

      <span class="pull-right">
        {{ HTML::link_to_route('session.reset', __('application.forgot_password')) }}
      </span>
    </fieldset>

    {{ Form::token() }}
  {{ Form::close() }}
@endsection
