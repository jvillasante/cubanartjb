@layout('layouts/main')

@section('content')
  <div class="row-fluid">
    <div class="span12">
      <div class="page-header">
        <div class="row-fluid">
          <div class="span12">
            <h1>{{ __('application.contact1') }} {{ __('application.name') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid contact">
    <div class="span4">
      <ul class="bordered-list">
        <li class="img-location"><strong>{{ __('application.address_heading') }}</strong><div style="margin-left:20px;">{{ __('application.address') }}</div></li>
        <li class="img-phone"><strong>{{ __('application.phones') }}</strong><div style="margin-left:20px;">{{ __('application.phone_numbers') }}</div></li>
      </ul>
    </div>
    <div class="span8">
      <div style="margin-left:30px; margin-right:30px;" class="wpcf7" id="wpcf7-f75-t1-o1">
        <form action="{{ URL::to_route('home.about.send') }}" method="post" class="wpcf7-form" id="cform" name="cform">
          <div class="form-meta clearfix">
            <div class="formcol">
              <label for="first_name">{{ __('application.first_name') }}</label>
              <input type="text" name="first_name" value="" id="fname" size="40" />
              <label for="last_name">{{ __('application.last_name') }}</label>
              <input type="text" name="last_name" value="" id="lname" size="40" />
            </div>
            <div class="formcol">
              <label for="email">{{ __('application.email_address') }}</label>
              <input type="text" name="email" id="email" value="" size="40" />
              <label for="subject">{{ __('application.subject') }}</label>
              <input type="text" name="subject" id="subject" value="" size="40" />
            </div>
          </div>
          <label for="message">{{ __('application.message') }}</label>
          <textarea name="message" id="message" cols="40" rows="10"></textarea>
          <input type="submit" id="send-message" value="{{ __('application.send') }}" class="btn btn-success" />
        </form>
      </div>
    </div>
  </div>
@endsection

