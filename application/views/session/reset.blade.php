@layout('layouts/main')

@section('content')
  {{ Form::open(URL::to_route('session.reset.check'), 'POST', array('class' => 'form-horizontal well span8 offset2')) }}
    <fieldset>
      <legend>
        <h1>{{ __('application.reset_password') }}</h1>
      </legend>

      <div class="control-group @if ($errors->has('email')) {{ 'error' }} @endif">
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

      <div class="control-group @if ($errors->has('password')) {{ 'error' }} @endif">
        {{ Form::label('password', __('application.new_password'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-asterisk"></i></span>{{ Form::password('password', array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('password'))
            <span class="help-inline"> {{ $errors->first('password') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group @if ($errors->has('password_confirmation')) {{ 'error' }} @endif">
        {{ Form::label('password_confirmation', __('application.new_password_confirm'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-asterisk"></i></span>{{ Form::password('password_confirmation', array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('password_confirmation'))
            <span class="help-inline"> {{ $errors->first('password_confirmation') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          {{ Form::submit(__('application.reset_password'), array('class' => 'btn btn-success')) }}
        </div>
      </div>
    </fieldset>

    {{ Form::token() }}
  {{ Form::close() }}
@endsection
