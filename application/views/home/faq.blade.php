@layout('layouts/main')

@section('content')
<div class="row-fluid">
  <div class="span12">
    <div class="page-header">
      <div class="row-fluid">
        <div class="span12">
          <h1>{{ __('application.faq_large') }} </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid faq">
  <div class="span6">
    <div class="question-section">
      <h4>{{ __('application.faq1') }}</h4>
      <p>{{ __('application.faq1_answer') }}</p>
    </div>
    <div class="question-section">
      <h4>{{ __('application.faq2') }}</h4>
      <p>{{ __('application.faq2_answer') }}</p>
    </div>
  </div>
  <div class="span6">
    <div class="question-section">
      <h4>{{ __('application.faq3') }}</h4>
      <p>{{ __('application.faq3_answer') }}</p>
    </div>
    <div class="question-section">
      <h4>{{ __('application.faq4') }}</h4>
      <p>{{ __('application.faq4_answer') }}</p>
    </div>
  </div>
</div>
@endsection

