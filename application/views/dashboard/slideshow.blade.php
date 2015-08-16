@layout('layouts/dashboard')

@section('scripts')
  {{ Basset::show('scripts-dashboard-slideshow.js') }}
@endsection

@section('content')
  <fieldset>
    <legend><h1>{{ __('application.manage_slideshow') }}</h1></legend>
  </fieldset>

  <div class="row-fluid">
    <div class="span6 pull-center">
      {{ Form::open_for_files(URL::to_route('dashboard.slideshow.check', array('num' => 1)), 'POST', array('class' => 'well')) }}
        <div class="row-fluid">
          <div class="control-group @if ($errors->has("image1")) {{ 'error' }} @endif">
            {{ Form::label("image1", __('application.img1'), array('class' => 'control-label')) }}
            <div class="controls">
              <div class="fileupload fileupload-exists" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 230px; height: 150px;"><img src="{{ HtmlHelpers::slideshow_image_path($slideshow, 1, 'small') }}" /></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="image1" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
                  {{ Form::submit(__('application.save'), array('class' => 'btn btn-success')) }}
                </div>
              </div>
              @if ($errors->has("image1"))
                <span class="help-inline"> {{ $errors->first("image1") }} </span>
              @endif
            </div>
          </div>
        </div>
        {{ Form::token() }}
      {{ Form::close() }}
    </div>
    <div class="span6 pull-center">
      {{ Form::open_for_files(URL::to_route('dashboard.slideshow.check', array('num' => 2)), 'POST', array('class' => 'well')) }}
        <div class="row-fluid">
          <div class="control-group @if ($errors->has("image2")) {{ 'error' }} @endif">
            {{ Form::label("image2", __('application.img2'), array('class' => 'control-label')) }}
            <div class="controls">
              <div class="fileupload fileupload-exists" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 230px; height: 150px;"><img src="{{ HtmlHelpers::slideshow_image_path($slideshow, 2, 'small') }}" /></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="image2" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
                  {{ Form::submit(__('application.save'), array('class' => 'btn btn-success')) }}
                </div>
              </div>
              @if ($errors->has("image2"))
                <span class="help-inline"> {{ $errors->first("image2") }} </span>
              @endif
            </div>
          </div>
        </div>
        {{ Form::token() }}
      {{ Form::close() }}
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6 pull-center">
      {{ Form::open_for_files(URL::to_route('dashboard.slideshow.check', array('num' => 3)), 'POST', array('class' => 'well')) }}
        <div class="row-fluid">
          <div class="control-group @if ($errors->has("image3")) {{ 'error' }} @endif">
            {{ Form::label("image3", __('application.img3'), array('class' => 'control-label')) }}
            <div class="controls">
              <div class="fileupload fileupload-exists" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 230px; height: 150px;"><img src="{{ HtmlHelpers::slideshow_image_path($slideshow, 3, 'small') }}" /></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="image3" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
                  {{ Form::submit(__('application.save'), array('class' => 'btn btn-success')) }}
                </div>
              </div>
              @if ($errors->has("image3"))
                <span class="help-inline"> {{ $errors->first("image3") }} </span>
              @endif
            </div>
          </div>
        </div>
        {{ Form::token() }}
      {{ Form::close() }}
    </div>
    <div class="span6 pull-center">
      {{ Form::open_for_files(URL::to_route('dashboard.slideshow.check', array('num' => 4)), 'POST', array('class' => 'well')) }}
        <div class="row-fluid">
          <div class="control-group @if ($errors->has("image4")) {{ 'error' }} @endif">
            {{ Form::label("image4", __('application.img4'), array('class' => 'control-label')) }}
            <div class="controls">
              <div class="fileupload fileupload-exists" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 230px; height: 150px;"><img src="{{ HtmlHelpers::slideshow_image_path($slideshow, 4, 'small') }}" /></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="image4" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
                  {{ Form::submit(__('application.save'), array('class' => 'btn btn-success')) }}
                </div>
              </div>
              @if ($errors->has("image4"))
                <span class="help-inline"> {{ $errors->first("image4") }} </span>
              @endif
            </div>
          </div>
        </div>
        {{ Form::token() }}
      {{ Form::close() }}
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6 pull-center">
      {{ Form::open_for_files(URL::to_route('dashboard.slideshow.check', array('num' => 5)), 'POST', array('class' => 'well')) }}
        <div class="row-fluid">
          <div class="control-group @if ($errors->has("image5")) {{ 'error' }} @endif">
            {{ Form::label("image5", __('application.img5'), array('class' => 'control-label')) }}
            <div class="controls">
              <div class="fileupload fileupload-exists" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 230px; height: 150px;"><img src="{{ HtmlHelpers::slideshow_image_path($slideshow, 5, 'small') }}" /></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="image5" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
                  {{ Form::submit(__('application.save'), array('class' => 'btn btn-success')) }}
                </div>
              </div>
              @if ($errors->has("image5"))
                <span class="help-inline"> {{ $errors->first("image5") }} </span>
              @endif
            </div>
          </div>
        </div>
        {{ Form::token() }}
      {{ Form::close() }}
    </div>
    <div class="span6 pull-center">
      {{ Form::open_for_files(URL::to_route('dashboard.slideshow.check', array('num' => 6)), 'POST', array('class' => 'well')) }}
        <div class="row-fluid">
          <div class="control-group @if ($errors->has("image6")) {{ 'error' }} @endif">
            {{ Form::label("image6", __('application.img6'), array('class' => 'control-label')) }}
            <div class="controls">
              <div class="fileupload fileupload-exists" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: 230px; height: 150px;"><img src="{{ HtmlHelpers::slideshow_image_path($slideshow, 6, 'small') }}" /></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="image6" /></span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
                  {{ Form::submit(__('application.save'), array('class' => 'btn btn-success')) }}
                </div>
              </div>
              @if ($errors->has("image6"))
                <span class="help-inline"> {{ $errors->first("image6") }} </span>
              @endif
            </div>
          </div>
        </div>
        {{ Form::token() }}
      {{ Form::close() }}
    </div>
  </div>
@endsection

