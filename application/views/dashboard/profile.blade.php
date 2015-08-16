@layout('layouts/dashboard')

@section('scripts')
  {{ Basset::show('scripts-dashboard-profile.js') }}
@endsection

@section('content')
<div class="row-fluid">
  <ul class="nav nav-tabs">
    @if ($active_tab == 'profile')
      <li class="active"><a href="#profile" data-toggle="tab">{{ __('application.profile') }}</a></li>
    @else
      <li><a href="#profile" data-toggle="tab">{{ __('application.profile') }}</a></li>
    @endif
    @if ($active_tab == 'password')
      <li class="active"><a href="#password" data-toggle="tab">{{ __('application.change_password') }}</a></li>
    @else
      <li><a href="#password" data-toggle="tab">{{ __('application.change_password') }}</a></li>
    @endif
  </ul>
</div>

<div class="tab-content">
  <div class="tab-pane @if ($active_tab == 'profile') active @endif" id="profile">
    {{ Form::open(URL::to_route('dashboard.profile.check'), 'POST', array('class' => 'well form-horizontal')) }}
    <fieldset>
      <legend><h1>{{ __('application.profile') }}</h1></legend>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('username')) {{ 'error' }} @endif">
          {{ Form::label('username', __('application.username'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>{{ Form::text('username', HtmlHelpers::user_data($current_user, 'username'), array('class' => 'input-xlarge', 'autofocus' => 'autofocus')) }}
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
              <span class="add-on"><i class="icon-envelope"></i></span>{{ Form::text('email', HtmlHelpers::user_data($current_user, 'email'), array('class' => 'input-xlarge', 'disabled' => 'disabled')) }}
            </div>
            <span class="help-block">{{ __('application.email_footer') }}</span>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="control-group @if ($errors->has('first_name')) {{ 'error' }} @endif">
          {{ Form::label('first_name', __('application.first_name'), array('class' => 'control-label')) }}
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>{{ Form::text('first_name', HtmlHelpers::user_data($current_user, 'metadata.first_name'), array('class' => 'input-xlarge')) }}
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
              <span class="add-on"><i class="icon-user"></i></span>{{ Form::text('last_name', HtmlHelpers::user_data($current_user, 'metadata.last_name'), array('class' => 'input-xlarge')) }}
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
            {{ Form::submit(__('application.save_profile'), array('class' => 'btn btn-success')) }}
          </div>
        </div>
      </div>

      {{ Form::token() }}
    {{ Form::close() }}
  </div>

  <div class="tab-pane @if ($active_tab == 'password') active @endif" id="password">
    {{ Form::open(URL::to_route('dashboard.profile.change_password'), 'POST', array('class' => 'well form-horizontal')) }}
    <fieldset>
      <legend><h1>{{ __('application.change_password_header') }}</h1></legend>

      <div class="control-group @if ($errors && $errors->has('current_password')) {{ 'error' }} @endif">
        {{ Form::label('current_password', __('application.current_password'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-asterisk"></i></span>{{ Form::password('current_password', array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('current_password'))
            <span class="help-inline">{{ $errors->first('current_password') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group @if ($errors && $errors->has('new_password')) {{ 'error' }} @endif">
        {{ Form::label('new_password', __('application.new_password'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-asterisk"></i></span>{{ Form::password('new_password', array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('new_password'))
            <span class="help-inline">{{ $errors->first('new_password') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group @if ($errors && $errors->has('new_password_confirmation')) {{ 'error' }} @endif">
        {{ Form::label('new_password_confirmation', __('application.new_password_confirm'), array('class' => 'control-label')) }}
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-asterisk"></i></span>{{ Form::password('new_password_confirmation', array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('new_password_confirmation'))
            <span class="help-inline">{{ $errors->first('new_password_confirmation') }} </span>
          @endif
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          {{ Form::submit(__('application.change_password'), array('class' => 'btn btn-success')) }}
        </div>
      </div>

      {{ Form::token() }}
    {{ Form::close() }}
  </div>
</div>


@endsection

