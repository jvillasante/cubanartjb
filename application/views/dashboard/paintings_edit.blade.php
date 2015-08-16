@layout('layouts/dashboard')

@section('styles')
  {{ Basset::show('styles-dashboard-paintings_edit.css') }}
@endsection

@section('scripts')
  {{ Basset::show('scripts-dashboard-paintings_edit.js') }}
@endsection

@section('content')
<div class="row-fluid">
  {{ Form::open_for_files(URL::to_route('dashboard.paintings.edit.check', array('painting_id' => $painting->id)), 'PUT', array('class' => 'well')) }}
  <fieldset>
    <legend><h1>{{ __('application.edit_painting') }}</h1></legend>

    <div class="span4">
      <div>
        <div class="fileupload fileupload-exists" data-provides="fileupload">
          <div class="fileupload-preview thumbnail" style="width: 180px; height: 150px;"><img src="{{ HtmlHelpers::image_path($painting->image_path, 'small') . '?random=' . Str::random(10) . time() }}" /></div>
          <div>
            <span class="btn btn-file"><span class="fileupload-new">{{ __('application.select_image') }}</span><span class="fileupload-exists">{{ __('application.change_image') }}</span><input type="file" name="painting_image" /></span>
            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">{{ __('application.remove_image') }}</a>
          </div>
        </div>
      </div>
    </div>

    <div class="span7">
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('name')) {{ 'error' }} @endif">
          {{ Form::label('name', __('application.painting_name'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::text('name', HtmlHelpers::painting_data($painting, 'name'), array('class' => 'input-xlarge', 'autofocus' => 'autofocus')) }}
          </div>
          @if ($errors->has('name'))
            <span class="help-inline"> {{ $errors->first('name') }} </span>
          @endif
        </div>
      </div>
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('dimensions')) {{ 'error' }} @endif">
          {{ Form::label('dimensions', __('application.painting_dimensions'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::text('dimensions', HtmlHelpers::painting_data($painting, 'dimensions'), array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('dimensions'))
            <span class="help-inline"> {{ $errors->first('dimensions') }} </span>
          @endif
        </div>
      </div>
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('type')) {{ 'error' }} @endif">
          {{ Form::label('type', __('application.painting_type'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::text('type', HtmlHelpers::painting_data($painting, 'type'), array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('type'))
            <span class="help-inline"> {{ $errors->first('type') }} </span>
          @endif
        </div>
      </div>
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('painter')) {{ 'error' }} @endif">
          {{ Form::label('painter', __('application.painting_painter'), array('class' => 'control-label')) }}
          <div class="controls">
            <select class="input-xlarge" name="painter">
              <option value="" disabled="disabled">{{ __('application.select_option') }}</option>
              @foreach (HtmlHelpers::getPainters() as $painter)
                @if (HtmlHelpers::painting_data($painting, 'painter') == $painter)
                  <option selected="selected" value="{{ $painter }}">{{ $painter }}</option>
                @else
                  <option value="{{ $painter }}">{{ $painter }}</option>
                @endif
              @endforeach
            </select>

          </div>
          @if ($errors->has('painter'))
            <span class="help-inline"> {{ $errors->first('painter') }} </span>
          @endif
        </div>
      </div>
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('year')) {{ 'error' }} @endif">
          {{ Form::label('year', __('application.painting_year'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::text('year', HtmlHelpers::painting_data($painting, 'year'), array('class' => 'input-xlarge')) }}
          </div>
          @if ($errors->has('year'))
            <span class="help-inline"> {{ $errors->first('year') }} </span>
          @endif
        </div>
      </div>
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('comment')) {{ 'error' }} @endif">
          {{ Form::label('comment', __('application.painting_comment'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::textarea('comment', HtmlHelpers::painting_data($painting, 'comment'), array('class' => 'editor', 'rows' => 8)) }}
          </div>
          @if ($errors->has('comment'))
            <span class="help-inline"> {{ $errors->first('comment') }} </span>
          @endif
        </div>
      </div>
      <div class="row-fluid">
        <div class="control-group @if ($errors->has('tags')) {{ 'error' }} @endif">
          {{ Form::label('tags', __('application.painting_tags'), array('class' => 'control-label')) }}
          <div class="controls">
            {{ Form::text('tags', null, array('class' => 'tagManager span4')) }}
            @if ($errors->has('tags'))
              <span class="help-inline"> {{ $errors->first('tags') }} </span>
            @endif
            <span class="help-block">{{ __('application.painting_tags_explanation') }}</span>
          </div>
        </div>
      </div>


      <div class="row-fluid">
        <div class="control-group">
          <div class="controls">
            {{ Form::submit(__('application.painting_save'), array('class' => 'btn btn-success')) }}
          </div>
        </div>
      </div>
    </div>

    {{ Form::token() }}
  {{ Form::close() }}
</div>

<script type="text/javascript">
  var old_tags = <?php echo HtmlHelpers::old_tags(); ?>;
  var painting_tags = <?php echo HtmlHelpers::painting_data($painting, 'tags'); ?>;
  var all_tags = <?php echo HtmlHelpers::all_tags(); ?>;
</script>

@endsection

